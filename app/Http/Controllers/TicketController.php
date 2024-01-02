<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
class TicketController extends Controller
{
    

public function show(Request $request)
     {  if ($request->IsMethod("post"))
        $validtate=Validator::make($request->all(),
        [
        'date'=>'required|date|after_or_equal:now|nullable',
        'city'=>'exists:cities,id'
        ]);
        
        if($validtate->fails()){
        dd($validtate->errors());
         }
        else{ 

         $date_s=$request->date;
         $city_id=$request->city;
        $ticket=Ticket::where('city_id',$city_id)->where('date_s',$date_s)->get();
        $city=City::all();
        return view('home',['ticket'=>$ticket,'city'=>$city]);
     }
    }


public function filter()
     {   $ticket=Ticket::all();
         $city=City::all();
         return view('home',['ticket'=>$ticket,'city'=>$city]);
     }
 



    public function create()
    {
        $city=City::all();
        $company=Company::all();
        return view('addticket',['company'=>$company,'city'=>$city]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if($request->IsMethod("post"))
        { 

            $validtate=Validator::make($request->all(),[
                'date_s'=>'date|required|after_or_equal:now',
                'date_e'=>'date|required|after_or_equal:date_s'
                
                
                ]);
                
           if($validtate->fails()){
                dd($validtate->errors());
                 }
                else{ Ticket::create(
                    ['company_id'=>$request->company,
                    'city_id'=>$request->city,
                    'date_s'=>$request->date_s,
                    'date_e'=>$request->date_e ]);
                     echo json_encode(['status'=>'Add Ticket']);
        }}}

        public function destroy($id)
        {
        
            $tick=Ticket::find($id);
            
             $tick->delete($id);
             return redirect()->route('view_ticket');
            


    }
 





}
