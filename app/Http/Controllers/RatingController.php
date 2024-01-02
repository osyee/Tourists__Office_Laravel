<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Customer;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $rating=Rating::all();
        return view('add_Rating',['rating'=>$rating,'id'=>$id]);

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
    if($request->IsMethod('post')){

    $customer_id=Customer::where('email',$request->email)->value('id');
    
    $customer_hotels=Customer::find($customer_id)->hotels;
   
    $allowed=false;
    foreach($customer_hotels as $hotel)
    {
    if($hotel->id==$id)
    $allowed=true;
    break;
    }
  

     if($allowed)
      {

        Rating::create([
        'hotel_id'=>$id,
        'customer_id'=>$customer_id,
        'comment'=>$request->comment,
        'rate'=>$request->rate]);
        }else{
       echo "not allowed";

      }

    }}



    


    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $rating=Rating::find($id);
    return view('edit_Rating',['rating'=>$rating]);

 
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->IsMethod('post')){
            $rate=$request->rate;
            $comment=$request->comment;
            $rating= Rating::find($id);
            $rating->update(['comment'=>$comment,'rate'=>$rate]);
           
             return redirect()->to(route('ratinghotel',['id'=>$rating->hotel_id]));}

        }
        public function edit_customer_rating($id){

            $rating=Rating::find($id);
            return view('edit_customer_rating',['rating'=>$rating]);
            
        

        }

    




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
