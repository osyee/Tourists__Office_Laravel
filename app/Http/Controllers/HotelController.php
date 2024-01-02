<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;  
use App\Models\City;
use App\Models\Rating;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel=Hotel::all();
        return view('viewhotel',['hotel'=>$hotel]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $hotel= new Hotel;
       return view('addHotel' , ['hotel' =>$hotel]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validate=Validator::make($request->all(),
            [
            'name'=>"required|string",
            'city'=>"required|string",
            ]);
            
            if($validate->fails())
            {
            dd($validate->errors());
            }
            else
            {
             $city = $request->city;
             $city_id = City::where('name' , $city)->value('id');
      
             Hotel::create(
              ['name'=>$request->name,
              'city_id'=>$city_id,
               ]);
                   echo json_encode(['status'=>'Add Hotel']);
                   return redirect()->to(route('viewHotel'));
            }
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('editHotel' , ['hotel' =>$hotel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $hotel = Hotel::find($id);
      
        if($request->isMethod('post'))
        {$validate=Validator::make($request->all(),
            [
            'name'=>"required|string",
            'city'=>"required|string",
            ]);
            
            if($validate->fails())
            {
            dd($validate->errors());
            }
            else
            {
            
            $city = $request->city;
            $city_id = City::where('name' , $city)->value('id');
            $name = $request->name;
                    
            $hotel->name = $name;
            $hotel->city_id=$city_id;
            $hotel->save();
                   
                 echo json_encode(['status'=>'Update Hotel']);
                 return redirect()->to(route('viewHotel'));

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel=Hotel::find($id);
             $hotel->delete($id);
             return redirect(route('viewHotel'));
    }
public function ratinghotel($id){

    $hotel=Hotel::find($id);
       
    $hotelrating=$hotel->ratings;
 
     return view('viewratingshotel',['hotelrating'=>$hotelrating,'id'=>$id]);



}






}
