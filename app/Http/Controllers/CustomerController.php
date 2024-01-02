<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;  
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $customer=Customer::all();
    return view('viewcustomer',['customer'=>$customer]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('addcustomer');
        }
        
        
        
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        if($request->IsMethod('post')){
            $validate=Validator::make($request->all(),[
                
             'name'=>"required|string|max:10",
            'mobile'=>"required|string",
            // 'gendor'=>"required|string|in:male,fmale",
            'email'=>"required|email|max:20|ends_with:hotmil.com,gmail.com"
             ]);
            if($validate->fails()){
              dd($validate->errors());
             }
              else{
            Customer::create(
            ['name'=>$request->name,
            'mobile'=>$request->mobile,
            'gender'=>$request->gender,
            'email'=>$request->email
            ]);
             echo json_encode(['status'=>'Add Customer']);}
        }}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }







    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::find($id);
        return view('editcustomer',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  if ($request->IsMethod("post")){
        $validate=Validator::make($request->all(),
        [
        'name'=>"required|string|max:10",
        'mobile'=>"required|string",
        'email'=>"required|email|max:20|ends_with:hotmil.com,gmail.com"
        ]);
        
        if($validate->fails()){
        dd($validate->errors());
         }
        else{
            $customer=Customer::find($id);
            $customer->name=$request->name;
            $customer->mobile=$request->mobile;
            $customer->gender=$request->gender;
            $customer->email=$request->email;
            $customer->save();
        return redirect()->to(route('view_custom'));}

    }
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $custom=Customer::find($id);
            
        $custom->delete($id);
        return redirect()->route('viewcustomer');
       
    }

     public function filter(Request $request){
      
        if ($request->IsMethod("post"))
        $validtate=Validator::make($request->all(),
        [
        'email'=>"required|email|max:20|ends_with:hotmil.com,gmail.com"
        ]);
        
        if($validtate->fails()){
        dd($validtate->errors());
         }
        else{

        if($request->IsMethod('post')){
            $email =$request->email;

        $customer=Customer::where('email',$email)->get();
            
        return view('viewcustomer',['customer'=>$customer]);


        }



     }}
     
     public function customrating($id){
        
        $customer=Customer::find($id);
        $custhotel=$customer->bookings;
        $custrate=$customer->ratings;
        return view('customhotel',['custhotel'=>$custhotel,'custrate'=>$custrate]);
     }
     

     
     public function customer_rating($id){
       
        $hotel=Hotel::find($id);
        $custrate=$hotel->ratings;

        return view('customrating',['custrate'=>$custrate]);



     }




}
