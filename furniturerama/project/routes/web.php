<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/about', function () {
    return view('about');
});

// CONTACT FORM CONTROLLER FOR PAGE + SEND MAIL
Route::get('/contact', 'sendMailController@index');
Route::post('/contact/email', 'sendMailController@send');


// Route::get('/detail', function () {
//     return view('furnitures/detail');
// });

// Route::get('/list', function () {
//     return view('furnitures/list');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FurnituresController@home');

Route::get('/furniture', 'FurnituresController@index');

Route::get('/furniture/category/{name}', 'FurnituresController@categoryList');

Route::get('/furnitures/{id}/detail', 'FurnituresController@detail');


//Route to add items to cart
Route::get('/cart/{id}', 'FurnituresController@addToCart');

//Route added to display cart page
Route::get('/cart', 'FurnituresController@getCart');

//Route to remove items from cart
Route::delete('/cart/remove', 'FurnituresController@destroy');

//Route to update qty in cart
Route::patch('/cart/update/{id}', 'FurnituresController@updateQty');

Route::get('/search', 'SearchController@search')->name('search');

//Route to checkout to confirmation page
Route::get('/checkout', 'CheckoutController@index')->middleware('auth');
Route::post('/checkout','CheckoutController@checkout');
Route::post('/checkoutAddPromotion', 'CheckoutController@promotion');
Route::post('/checkoutRemovePromotion', 'CheckoutController@removeCoupon');

Route::middleware('admin')->group(function(){

    Route::get('/admin', 'AdminController@home');

    //furniture table

    Route::get('/admin/furniture/view', 'Admin\FurnituresController@index');

    Route::get('/admin/furniture/add', 'Admin\FurnituresController@create');

    Route::post('/admin/furniture/add', 'Admin\FurnituresController@store');

    Route::delete('/admin/furniture/view', 'Admin\FurnituresController@destroy');

    Route::get('/admin/furniture/{id}/edit', 'Admin\FurnituresController@edit');

    Route::put('/admin/furniture/view', 'Admin\FurnituresController@update');

    Route::get('/admin_search', 'Admin\FurnituresController@search');

    //review table

    Route::get('/admin/review/view', 'Admin\ReviewsController@index');

    Route::get('/admin/review/add', 'Admin\ReviewsController@create');

    Route::post('/admin/review/add', 'Admin\ReviewsController@store');

    Route::delete('/admin/review/view', 'Admin\ReviewsController@destroy');

    Route::get('/admin/review/{id}/edit', 'Admin\ReviewsController@edit');

    Route::put('/admin/review/view', 'Admin\ReviewsController@update');

    //tax table

    Route::get('/admin/tax/view', 'Admin\TaxesController@index');

    Route::get('/admin/tax/add', 'Admin\TaxesController@create');

    Route::post('/admin/tax/add', 'Admin\TaxesController@store');

    Route::delete('/admin/tax/view', 'Admin\TaxesController@destroy');

    Route::get('/admin/tax/{id}/edit', 'Admin\TaxesController@edit');

    Route::put('/admin/tax/view', 'Admin\TaxesController@update');

    //user table

    Route::get('/admin/user/view', 'Admin\UsersController@index');

    Route::get('/admin/user/add', 'Admin\UsersController@create');

    Route::post('/admin/user/add', 'Admin\UsersController@store');

    Route::delete('/admin/user/view', 'Admin\UsersController@destroy');

    Route::get('/admin/user/{id}/edit', 'Admin\UsersController@edit');

    Route::put('/admin/user/view', 'Admin\UsersController@update');

    //manufacturer table

    Route::get('/admin/manufacturer/view', 'Admin\ManufacturersController@index');

    Route::get('/admin/manufacturer/add', 'Admin\ManufacturersController@create');

    Route::post('/admin/manufacturer/add', 'Admin\ManufacturersController@store');

    Route::delete('/admin/manufacturer/view', 'Admin\ManufacturersController@destroy');

    Route::get('/admin/manufacturer/{id}/edit', 'Admin\ManufacturersController@edit');

    Route::put('/admin/manufacturer/view', 'Admin\ManufacturersController@update');

     //Category table

    Route::get('/admin/category/view', 'Admin\CategoryController@index');

    Route::get('/admin/category/add', 'Admin\CategoryController@create');

    Route::post('/admin/category/add', 'Admin\CategoryController@store');

    Route::delete('/admin/category/view', 'Admin\CategoryController@destroy');

    Route::get('/admin/category/{id}/edit', 'Admin\CategoryController@edit');

    Route::put('/admin/category/view', 'Admin\CategoryController@update');

      //Order table

    Route::get('/admin/order/view', 'Admin\OrderController@index');

    Route::get('/admin/order/filterShipping', 'Admin\OrderController@filterShipping');

    Route::get('/admin/order/filterTransactions', 'Admin\OrderController@filterTransaction');

    Route::delete('/admin/order/view', 'Admin\OrderController@destroy');

    Route::get('/admin/order/{id}/edit', 'Admin\OrderController@edit');

    Route::put('/admin/order/view', 'Admin\OrderController@update'); 

    //transaction table
    
    Route::get('/admin/transaction/view', 'Admin\TransactionsController@index');  

    Route::get('/admin/transaction/filterTransactions', 'Admin\TransactionsController@filterTransaction');


    //promotion table
    
    Route::get('/admin/promotion/view', 'Admin\PromotionsController@index'); 

    Route::get('/admin/promotion/add', 'Admin\PromotionsController@create'); 
     
    Route::post('/admin/promotion/add', 'Admin\PromotionsController@store'); 
     
    Route::delete('/admin/promotion/view', 'Admin\PromotionsController@destroy');  
     
    Route::get('/admin/promotion/{id}/edit', 'Admin\PromotionsController@edit');
     
    Route::put('/admin/promotion/view', 'Admin\PromotionsController@update');   

    //material table
    
    Route::get('/admin/material/view', 'Admin\MaterialsController@index'); 

    Route::get('/admin/material/add', 'Admin\MaterialsController@create'); 
    
    Route::post('/admin/material/add', 'Admin\MaterialsController@store'); 
    
    Route::delete('/admin/material/view', 'Admin\MaterialsController@destroy');  
    
    Route::get('/admin/material/{id}/edit', 'Admin\MaterialsController@edit');
    
    Route::put('/admin/material/view', 'Admin\MaterialsController@update');   
         
});



Route::post('/reviews', 'ReviewController@store');

Route::get('/user/profile', 'UserProfileController@index')->name('user.profile');
Route::get('/user/profile/{id}/edit', 'UserProfileController@edit');
Route::put('/user/profile', 'UserProfileController@update');
