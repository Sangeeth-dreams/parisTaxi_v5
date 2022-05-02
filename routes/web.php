<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('auth/login');
});
//======================================= Routes get from Frontend =========================================================

Route::get('/',[App\Http\Controllers\Frontend\HomeController ::class,'index']);
Route::get('/arrival',[App\Http\Controllers\Frontend\BookingController ::class,'arrival']);
Route::get('/disneytransfers',[App\Http\Controllers\Frontend\DisneytransfersController ::class,'disney']);
Route::get('/paristransfers',[App\Http\Controllers\Frontend\ParistransfersController ::class,'paris']);
Route::get('/onewayrates',[App\Http\Controllers\Frontend\RatesController ::class,'oneway']);

//==========================================================================================================



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
Route::view('/greeting','test');

//================================================== php mailer ================================================================

Route::get('send-mail-new', [App\Http\Controllers\Admin\SendMailController::class, 'sendMail']);
//Route::post('/send-mail-new', [App\Http\Controllers\Admin\SendMailController::class, 'sendMailPost']);

//============================================================================================================================


Route::view('/greeting','test');

//admin

Route::get('/{any?}', function(){
    return view('admin/dashboard/index');
});

Route::get('/{any?}', function(){
    return view('admin/places/index');
});

//tour categories

Route::get('/{any?}', function(){
    return view('admin/tourCategories/index');
});

//tour sub categories
Route::get('/{any?}', function(){
    return view('admin/tourSubCategories/index');
});

//passenger categories

Route::get('/{any?}', function(){
    return view('admin/passengerCategories/index');
});

//Rates
Route::get('/{any?}', function(){
    return view('admin/rates/index');
});

//FAQ
Route::get('/{any?}', function(){
    return view('admin/faq/index');
});

//Excursion Tour Categories
Route::get('/{any?}', function(){
    return view('admin/excursionTourCategories/index');
});

//Excursion Tour Rates
Route::get('/{any?}', function(){
    return view('admin/excursionTourRates/index');
});

//////// Riderecting routes will be define here
Route::get('/admin/admin-users', function () {
    return redirect('/home');
});

//////// Riderecting routes will be define here
Route::get('/admin/exc', function () {
    return redirect('/home');
});

//////// Riderecting routes will be define here
Route::get('/admin/places', function () {
    return redirect('/home');
});

//////// Riderecting routes will be define here
Route::get('/admin/passengerCategories', function () {
    return redirect('/home');
});

//////// Riderecting routes will be define here
Route::get('/admin/otherReservations', function () {
    return redirect('/home');
});

//////// Riderecting routes will be define here
Route::get('/admin/faq', function () {
    return redirect('/home');
});

//////// Riderecting routes will be define here
Route::get('/admin/tourSubCategories', function () {
    return redirect('/home');
});


//////// Riderecting routes will be define here
Route::get('/admin/tourCategories', function () {
    return redirect('/home');
});

//////// Riderecting routes will be define here
Route::get('/admin/rates', function () {
    return redirect('/home');
});

//////// Riderecting routes will be define here
Route::get('/admin/excursionTourCategories', function () {
    return redirect('/home');
});

//////// Riderecting routes will be define here
Route::get('/admin/excursionTourRates', function () {
    return redirect('/home');
});

/////////////////////////////////Email Handlers//////////////////////////////////////////////////////
Route::get('send_mail', function () {

    // $details = [

    //     'title' => 'Mail from ItSolutionStuff.com',

    //     'body' => 'This is for testing email using smtp'

    // ];

    // Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd("Email is Sent.");

});



Route::prefix('/admin')->name('admin.')->group(function(){
    //All the admin routes will be defined here...
    
            //fallback route
        Route::get('/{any?}', [App\Http\Controllers\HomeController::class, 'index']);
            //fallback route

        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        
        Route::get('/fetch/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'index']);
        Route::post('/create/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'store']);
        Route::delete('/delete/admin/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'delete']);
        Route::put('/update/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'update']);
        Route::post('/destroy/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'destroy']);

        //access Places.vue 
        Route::get('/fetch/places', [App\Http\Controllers\Admin\PlacesController::class, 'index']);
        Route::post('/create/places', [App\Http\Controllers\Admin\PlacesController::class, 'store']);
        Route::delete('/delete/places/{id}', [App\Http\Controllers\Admin\PlacesController::class, 'delete']);
        Route::put('/update/places', [App\Http\Controllers\Admin\PlacesController::class, 'update']);
        Route::post('/destroy/places', [App\Http\Controllers\Admin\PlacesController::class, 'destroy']);

        //access Tour Categories.vue 
        Route::get('/fetch/tourCategories', [App\Http\Controllers\Admin\TourController::class, 'index']);
        Route::post('/create/tourCategories', [App\Http\Controllers\Admin\TourController::class, 'store']);
        //Route::delete('/delete/tourCategories/{id}', [App\Http\Controllers\Admin\TourController::class, 'delete']);
        Route::put('/update/tourCategories', [App\Http\Controllers\Admin\TourController::class, 'update']);
        Route::post('/destroy/tourCategories', [App\Http\Controllers\Admin\TourController::class, 'destroy']);

        //access Passenger Categories.vue 
        Route::get('/fetch/passengerCategories', [App\Http\Controllers\Admin\PassengerController::class, 'index']);
        Route::post('/create/passengerCategories', [App\Http\Controllers\Admin\PassengerController::class, 'store']);
        Route::delete('/delete/passengerCategories/{id}', [App\Http\Controllers\Admin\PassengerController::class, 'delete']);
        Route::put('/update/passengerCategories', [App\Http\Controllers\Admin\PassengerController::class, 'update']);
        Route::post('/destroy/passengerCategories', [App\Http\Controllers\Admin\PassengerController::class, 'destroy']);

        //access Tour Sub Categories.vue
        Route::get('/fetch/tourSubCategories', [App\Http\Controllers\Admin\TourSubCategoriesController::class, 'index']);
        Route::post('/create/tourSubCategories', [App\Http\Controllers\Admin\TourSubCategoriesController::class, 'store']);
        //Route::delete('/delete/tourSubCategories/{id}', [App\Http\Controllers\Admin\TourSubCategoriesController::class, 'delete']);
        Route::put('/update/tourSubCategories', [App\Http\Controllers\Admin\TourSubCategoriesController::class, 'update']);
        Route::post('/destroy/tourSubCategories', [App\Http\Controllers\Admin\TourSubCategoriesController::class, 'destroy']);

        //access Rates.vue
        Route::get('/fetch/rates', [App\Http\Controllers\Admin\RatesController::class, 'index']);
        Route::get('/fetch/tourSubCategoriesToRates', [App\Http\Controllers\Admin\RatesController::class, 'fetchTourSubCategories']);
        Route::get('/fetch/tourCategoriesToRates', [App\Http\Controllers\Admin\RatesController::class, 'fetchTourCategories']);
        Route::get('/fetch/passengerCategoriesToRates', [App\Http\Controllers\Admin\RatesController::class, 'fetchPassengerCategories']);
        Route::get('/fetch/placesToRates', [App\Http\Controllers\Admin\RatesController::class, 'fetchPlaces']);

        Route::post('/create/rates', [App\Http\Controllers\Admin\RatesController::class, 'store']);
        Route::put('/update/rates', [App\Http\Controllers\Admin\RatesController::class, 'update']);
        Route::post('/destroy/rates', [App\Http\Controllers\Admin\RatesController::class, 'destroy']);
    
        //access Tours.vue 
        Route::get('/fetch/allTours', [App\Http\Controllers\Admin\ToursController::class, 'index']);
        Route::get('/fetch/tourCategoriesToTours', [App\Http\Controllers\Admin\ToursController::class, 'index']);
        Route::get('/fetch/tours', [App\Http\Controllers\Admin\ToursController::class, 'fetchTours']);
        Route::get('/fetch/ratesToTours', [App\Http\Controllers\Admin\ToursController::class, 'fetchRates']);

        Route::put('/update/tours', [App\Http\Controllers\Admin\ToursController::class, 'update']);
        Route::post('/destroy/tours', [App\Http\Controllers\Admin\ToursController::class, 'destroy']);

        //access Other Reservations.vue 
        Route::get('/fetch/otherReservations', [App\Http\Controllers\Admin\OtherReservationsController::class, 'index']);
        Route::post('/create/otherReservations', [App\Http\Controllers\Admin\OtherReservationsController::class, 'store']);
        Route::delete('/delete/otherReservations/{id}', [App\Http\Controllers\Admin\OtherReservationsController::class, 'delete']);
        Route::put('/update/otherReservations', [App\Http\Controllers\Admin\OtherReservationsController::class, 'update']);
        Route::put('/destroy/otherReservations', [App\Http\Controllers\Admin\OtherReservationsController::class, 'destroy']);

        //access FAQ.vue 

        Route::get('/fetch/faqs', [App\Http\Controllers\Admin\FAQController::class, 'index']);
        Route::post('/create/faqs', [App\Http\Controllers\Admin\FAQController::class, 'store']);
        //Route::delete('/delete/tourCategories/{id}', [App\Http\Controllers\Admin\TourController::class, 'delete']);
        Route::put('/update/faqs', [App\Http\Controllers\Admin\FAQController::class, 'update']);
        Route::put('/destroy/faqs', [App\Http\Controllers\Admin\FAQController::class, 'destroy']);

        //access Excursion Tour Categories.vue 
        Route::get('/fetch/excursionTourCategories', [App\Http\Controllers\Admin\ExcursionTourController::class, 'index']);
        Route::post('/create/excursionTourCategories', [App\Http\Controllers\Admin\ExcursionTourController::class, 'store']);
        Route::put('/update/excursionTourCategories', [App\Http\Controllers\Admin\ExcursionTourController::class, 'update']);
        Route::post('/destroy/excursionTourCategories', [App\Http\Controllers\Admin\ExcursionTourController::class, 'destroy']);

         //access Rates.vue
         Route::get('/fetch/excursionTourRates', [App\Http\Controllers\Admin\ExcursionTourRateController::class, 'index']);;
         Route::get('/fetch/passengerCategoriesToExcurtionTourRates', [App\Http\Controllers\Admin\ExcursionTourRateController::class, 'fetchPassengerCategories']);
         Route::get('/fetch/excursionTourCategoriesToExcurtionTourRates', [App\Http\Controllers\Admin\ExcursionTourRateController::class, 'fetchExcursionTourCategories']);
 
         Route::post('/create/excursionTourRates', [App\Http\Controllers\Admin\ExcursionTourRateController::class, 'store']);
         Route::put('/update/excursionTourRates', [App\Http\Controllers\Admin\ExcursionTourRateController::class, 'update']);
         Route::post('/destroy/excursionTourRates', [App\Http\Controllers\Admin\ExcursionTourRateController::class, 'destroy']);

        //access ExcursionTours.vue 
        Route::get('/fetch/allTours', [App\Http\Controllers\Admin\ExcursionTourBackController::class, 'index']);
        Route::get('/fetch/excersionTourCategoriesToExcersionTours', [App\Http\Controllers\Admin\ExcursionTourBackController::class, 'fetchExcursionTourCategories']);
        Route::get('/fetch/excersionTourRatesToExcersionTours', [App\Http\Controllers\Admin\ExcursionTourBackController::class, 'fetchExcursionTourRates']);
        Route::get('/fetch/excursionTours', [App\Http\Controllers\Admin\ExcursionTourBackController::class, 'index']);

        Route::post('/create/excursionTours', [App\Http\Controllers\Admin\ExcursionTourBackController::class, 'store']);;
        Route::put('/update/excursionTours', [App\Http\Controllers\Admin\ExcursionTourBackController::class, 'update']);
        Route::post('/destroy/excursionTours', [App\Http\Controllers\Admin\ExcursionTourBackController::class, 'destroy']);



            
  });

 


