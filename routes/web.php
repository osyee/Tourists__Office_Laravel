<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/", function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\TicketController::class,'filter'])->name('home')->middleware("auth");



//....Booking....//
//..view..
Route::get("/booksview", [App\Http\Controllers\BookingController::class,'index'])->middleware("auth");;
//..filter..
Route::post("/add/bookfilter", [App\Http\Controllers\BookingController::class,'filterbooking'])->name('filter-book')->middleware("auth");;
//...edit
Route::get("/add/bookedit/{id}", [App\Http\Controllers\BookingController::class,'edit'])->name ('edit')->middleware("auth");;
//...update
Route::post("/update/book/{id}", [App\Http\Controllers\BookingController::class,'update'])->name('update-book')->middleware("auth");;
//..add
Route::get("/add/book/{id}", [App\Http\Controllers\BookingController::class,'create'])->name('add-book')->middleware("auth");;
//...store
Route::post("/create/book/{id}", [App\Http\Controllers\BookingController::class,'store'])->name('create-book')->middleware("auth");;
//...delete
Route::get("/delete/{id}", [App\Http\Controllers\BookingController::class,'destroy'])->name('delete_book')->middleware("auth");;


//........ticket....//

//..filter
Route::post("/filter/ticket", [App\Http\Controllers\TicketController::class,'show'])->name('filtered-ticket')->middleware("auth");;
//..add
Route::get("/addtick", [App\Http\Controllers\TicketController::class,'create'])->middleware("auth");;
//...store
Route::post("/creat/tick", [App\Http\Controllers\TicketController::class,'store'])->name('creat-tick')->middleware("auth");;
//..delete
Route::get("/deletetick/{id}", [App\Http\Controllers\TicketController::class,'destroy'])->name('delete')->middleware("auth");;



//........company..//

//..view..
Route::get("/compview", [App\Http\Controllers\CompanyController::class,'index'])->name('company_view')->middleware("auth");
//..viewbyticket
Route::get("/compview/tick/{id}", [App\Http\Controllers\CompanyController::class,'showbyticket'])->name('company_view_by_ticket')->middleware("auth");
//...searc
Route::post("/compfilter", [App\Http\Controllers\CompanyController::class,'filter'])->name('compfilter')->middleware("auth");
//...edit..
Route::get("/editcomp/{id}", [App\Http\Controllers\CompanyController::class,'edit'])->name ('edit_company')->middleware("auth");;
//..update..
Route::post("/updatecomp/{id}", [App\Http\Controllers\CompanyController::class,'update'])->name('update-company')->middleware("auth");;
//..delete
Route::get("/deletecomp/{id}", [App\Http\Controllers\CompanyController::class,'destroy'])->name('delete_company')->middleware("auth");;
//..add
Route::get("/addcomp", [App\Http\Controllers\CompanyController::class,'create'])->name('add_company')->middleware("auth");;
// //...store
 Route::post("/creat/comp", [App\Http\Controllers\CompanyController::class,'store'])->name('creat-company')->middleware("auth");;



//....hotel........

// ..add..
Route::get('addHotel' ,  [App\Http\Controllers\HotelController::class,'create'])->middleware("auth");
Route::post('addHotel' ,  [App\Http\Controllers\HotelController::class,'store'])->name('addHotel')->middleware("auth");
//..view..
Route::get("/hotelview", [App\Http\Controllers\HotelController::class,'index'])->name('viewHotel')->middleware("auth");
//..edit
Route::get("/hoteledit/{id}", [App\Http\Controllers\HotelController::class,'edit'])->name('edit_hotel')->middleware("auth");
//...update
Route::post("/hotelUpdate/{id}", [App\Http\Controllers\HotelController::class,'update'])->name('update_hotel')->middleware("auth");

//...delete
Route::get("hoteldelete/{id}", [App\Http\Controllers\HotelController::class,'destroy'])->name('delete_hotel')->middleware("auth");
//...ratinghotel
Route::get("/ratinghotel/{id}", [App\Http\Controllers\HotelController::class,'ratinghotel'])->name('ratinghotel')->middleware("auth");
//...editrating
Route::get("/ratingedit/{id}", [App\Http\Controllers\RatingController::class,'edit'])->name('edit_rating')->middleware("auth");
///....updaterating
Route::post("/ratingupdate/{id}", [App\Http\Controllers\RatingController::class,'update'])->name('update-rate')->middleware("auth");
//...addrating
Route::get("/ratingadd/{id}", [App\Http\Controllers\RatingController::class,'create'])->name('add_rating')->middleware("auth");
Route::post("/ratingstore/{id}", [App\Http\Controllers\RatingController::class,'store'])->name('store-rate')->middleware("auth");






///........customer....
//..view..
Route::get("/customview", [App\Http\Controllers\CustomerController::class,'index'])->name('view_custom')->middleware("auth");
//....create..
Route::get("/customadd", [App\Http\Controllers\CustomerController::class,'create'])->name('add_customer')->middleware("auth");
//.....store
Route::post("/customstore", [App\Http\Controllers\CustomerController::class,'store'])->name('store_customer')->middleware("auth");
//...edit..
Route::get("/customedit/{id}", [App\Http\Controllers\CustomerController::class,'edit'])->name('edit_customer')->middleware("auth");
//..update..
Route::post("/customupdate/{id}", [App\Http\Controllers\CustomerController::class,'update'])->name('update_customer')->middleware("auth");
//...delete
Route::get("/customdelete/{id}", [App\Http\Controllers\CustomerController::class,'destroy'])->name('delete_customer')->middleware("auth");
//...filter
Route::post("/customfilter", [App\Http\Controllers\CustomerController::class,'filter'])->name('filter_custom')->middleware("auth");
//...hotelrating
Route::get("/customratings/{id}", [App\Http\Controllers\CustomerController::class,'customrating'])->name('customrating')->middleware("auth");
//...create
Route::get("/addratingscustomer/{id}", [App\Http\Controllers\RatingController::class,'add_customer_rating'])->name('add_customer_rating')->middleware("auth");
//...store
Route::post("/addratings/{id}", [App\Http\Controllers\RatingController::class,'addstore_customer_rating'])->name('store_customer_rating')->middleware("auth");
//..rating
Route::get("/customer/rating/{id}", [App\Http\Controllers\CustomerController::class,'customer_rating'])->name('rating')->middleware("auth");





///....city.....
//..view..
Route::get("/cityview", [App\Http\Controllers\CityController::class,'index'])->name('city_view')->middleware("auth");
//..cityfilter
Route::post("/cityfilter", [App\Http\Controllers\CityController::class,'filter'])->name('cityfilter')->middleware("auth");
//...add_city
Route::get("/citycreate", [App\Http\Controllers\CityController::class,'create'])->name('add_city')->middleware("auth");
//..creat-city
Route::post("/citystore", [App\Http\Controllers\CityController::class,'store'])->name('creat-city')->middleware("auth");
// ..city update
Route::get('cityUpdate/{id}' , [App\Http\Controllers\CityController::class,'edit'])->name('update_city')->middleware("auth");
Route::post('cityUpdate/{id}' , [App\Http\Controllers\CityController::class,'update'])->name('update_city')->middleware("auth");
//....city_view_by_ticket
Route::get("/city/ticket/{id}", [App\Http\Controllers\CityController::class,'cityticket'])->name('city_view_by_ticket')->middleware("auth");