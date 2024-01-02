<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $company=Company::all();
        return view('viewcompany',['company'=>$company]);
     }
    
        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $comp=company::all();
        return view('addcompany',['comp'=>$comp]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$validtate=Validator::make($request->all(),
        [
            'title'=>'required|max:50',
            'address'=>'required|max:20|regex:/(^[A-Za-z.]$)/',
            'phone'=>'numeric|required|min:10|regex:/^(0)[0-9]{9}$/',
            
        ]);



        
        if($validtate->fails()){
        dd($validtate->errors());
         }
    else{
            Company::create(
            ['title'=>$request->title,
            'address'=>$request->address,
            'phone'=>$request->phone,
            ]);
             echo json_encode(['status'=>'Add Company']);
}}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function showbyticket($id)
    {
        $comp=company::find($id);
       
       $ticketscomp=$comp->tickets;
    
        return view('viewticketsbycompany',['ticketscomp'=>$ticketscomp]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comp=company::find($id);
        return view('editcompany',['comp'=>$comp]);
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validtate=Validator::make($request->all(),
        [
        'title'=>'required|unique:posts|max:50',
        'address'=>'string|max:255',
        'phone'=>'numeric|min:10|regex:/^(0)[0-9]{9}$/'
        
    ]);
        
    if($validtate->fails()){
    dd($validtate->errors());
     }
        else{$comp= Company::find($id);
            $comp->title=$request->title;
            $comp->address=$request->address;
            $comp->phone=$request->phone;
            $comp->save();
        return redirect()->back();}
        
        }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comp=Company::find($id);
            
             $comp->delete($id);
             return redirect()->route('company_view');
            
    }
    public function filter(Request $request)
      { 
    
    if($request->IsMethod('post')){
        $validtate=Validator::make($request->all(),
        [
        'title'=>'string|max:20',
        'address'=>'string|max:20',
  
        
        ]);
        
        if($validtate->fails()){
        dd($validtate->errors());
         }
        else{
         
             $title=$request->title;
             $address=$request->address;
            
            if($title &&! $address){
            $company=Company::where('title',$title)->get();
            
            return view('viewcompany',['company'=>$company]);
            }
    
            elseif($title && $address){
                $company=Company::where('title',$title)->where('address',$address)->get();
                return view('viewcompany',['company'=>$company]);
            
            }
             
            elseif(!$title &&$address){
             $company=Company::where('address',$address)->get();
            return view('viewcompany',['company'=>$company]);
            }
    
           else{
           echo"filter requere title or address";
            } }
           }
    
        }


}

