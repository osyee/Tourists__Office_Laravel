<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\City;
use App\Models\Hotel;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class BookingController extends Controller
{
    
    public function index()
    {
         
       $bookings=Booking::all();
       return view('viewbooking',['bookings'=>$bookings]);
    }


    
  public function filterbooking(Request $request){
    
    if($request->IsMethod('post')){
      $validate=Validator::make($request->all(),[
       'email'=>'email|required|exists:customers,email|max:20|ends_with:hotmil.com,gmail.com', 
        'date'=>'nullable|date'
      ]);
      if($validate->fails()){
        dd($validate->errors());
         }
        else{
         $email=$request->email;
         $date=$request->date;
        
        $custom_id=Customer::where('email',$email)->value('id');
        
        if($custom_id &&! $date){
        $bookings=Booking::where('customer_id',$custom_id)->get();
        return view('viewbooking',['bookings'=>$bookings]);
        }

        elseif($custom_id && $date){
        $bookings=Booking::where('customer_id',$custom_id)->where('book_date',$date)->get();
         return view('viewbooking',['bookings'=>$bookings]);
        
        }
         
        elseif(!$custom_id && $date){
        $bookings=Booking::where('book_date',$date)->get();
        return view('viewbooking',['bookings'=>$bookings]);
        }

       else{
       echo"filter requere email or date";
        } }
       }
  }
    
    public function create($id)
    {

     $ticket=Ticket::find($id);
     return view('addbook',['ticket'=>$ticket]);
   
   
    }

    
    public function store(Request $request,$id)
    {   
        if($request->IsMethod("post"))
        {  $validtate=Validator::make($request->all(),
            [
           'email'=>'email|required|exists:customers,email|max:20|ends_with:hotmil.com,gmail.com',
      
            ]);
            
            if($validtate->fails()){
            dd($validtate->errors());
             }
        else{
        $customer_id=Customer::where('email',$request->email)
        ->value('id'); 
    
        $tick_id=$id;
        
        if($customer_id){

        Booking::create(['ticket_id'=>$tick_id,
        'customer_id'=>$customer_id,
        'hotel_id'=>$request->hotel,
        'book_date'=>$request->date ]);
         echo json_encode(['status'=>'created']);
       
        }
        else  echo json_encode(['status'=>'customer or ticked not found']);
    
        }
    }
         

    }
   
    public function edit($id)
    {   
        $book=Booking::find($id);
        return view('editbook',['book'=>$book]);
    }

   
    public function update(Request $request,$id)
    {   $validtate=Validator::make($request->all(),
        [
        'name'=>'required|string|max:20',
       
        ]);
        
        if($validtate->fails()){
        dd($validtate->errors());
         }
        else{ $book= Booking::find($id);
        $name=$request->name;
        $nameCu=$book->customer();
        $hotel_id=$request->hotel;
        $book->update(['hotel_id'=>$hotel_id]);
        $nameCu->update(['name'=>$name]);
           
        return redirect()->back();}
        
        }


    public function destroy($id)
    {
        $book=Booking::find($id);
        $book->delete($id);
        return redirect()->back();
            

    }

}