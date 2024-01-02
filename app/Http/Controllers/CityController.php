<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Support\Facades\Validator;  
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $city=City::all();
           return view('viewcity',['city'=>$city]);
    }
  

    public function filter(Request $request){

        if($request->IsMethod('post')){
        $name=$request->name;
        $city=City::where('name',$name)->get();
            
        return view('viewcity',['city'=>$city]);


    }}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('add_city');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),
        [
        'name'=>"required|string",
        'country'=>"required|string",
        ]);
        
        if($validate->fails()){
        dd($validate->errors());
         }
        else{
        
        City::create(
            ['name'=>$request->name,
            'country'=>$request->country,
            ]);
            
             return redirect()->to(route('city_view'));
        }


    }
    public function edit($id) 
    {
    
        $city=City::find($id) ;
        return view('editCity',['city'=>$city]);

    }

    public function update($id , Request $request)
    {
        $city = City::find($id) ;
        if ($request->IsMethod("post"))
        {
            $validate=Validator::make($request->all(),
        [
        'name'=>"required|string",
        'country'=>"required|string",
        ]);
        
        if($validate->fails()){
        dd($validate->errors());
         }
        else{
        
            $city->name = $request->name;
            $city->country = $request->country;
            $city->save();
            return redirect(route('city_view'));
        }
        }

        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

   
    public function destroy(City $city , $id)
    {
        //    
    }

public function cityticket($id){
    $city=City::find($id);
       
    $ticketscity=$city->tickets;
 
     return view('viewticketsbycity',['ticketscity'=>$ticketscity]);



}



}
