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


// Route::get('/', function () {

//     // Test database connection
//     try {
//         DB::connection()->getPdo();
//         echo "Connected successfully to: " . DB::connection()->getDatabaseName();
//     } catch (\Exception $e) {
//         die("Could not connect to the database. Please check your configuration. error:" . $e );
//     }

//     return view('welcome');
// });

//admin 
Route::group(['middleware' =>['auth']],function()
{
Route::get('admin/add_category','AdminController@category');
Route::get('admin/add_boy','AdminController@boy');
Route::get('admin/add_coupon','AdminController@coupon');
Route::get('admin/add_dish','AdminController@dish');
Route::get('admin/add_about','AdminController@about');
Route::get('admin/add_slider','AdminController@slider');
Route::get('admin/add_deal','AdminController@deal');
Route::get('admin/see_order','AdminController@order');
Route::get('admin/see_item/{id}','AdminController@item');
Route::get('admin/invoice/{id}','AdminController@invoice');
Route::post('admin/order_status','AdminController@order_status');
Route::get('admin/forgot_password','AdminController@forget_password');



//category
Route::post('category/insert','CategoryController@insert');
Route::get('category/edit/{id}','CategoryController@edit');
Route::post('category/update','CategoryController@update');
Route::get('category/delete/{id}','CategoryController@delete');


//delivery boy
Route::post('boy/insert','DelieryboyController@insert');
Route::get('boy/edit/{id}','DelieryboyController@edit');
Route::post('boy/update','DelieryboyController@update');
Route::get('boy/delete/{id}','DelieryboyController@delete');

// coupon
Route::post('coupon/insert','CouponController@insert');
Route::get('coupon/edit/{id}','CouponController@edit');
Route::post('coupon/update','CouponController@update');
Route::get('coupon/delete/{id}','CouponController@delete');

//dish
Route::post('dish/insert','DishController@save');
Route::get('dish/delete/{id}','DishController@delete');
Route::get('admin/dish/edit/{id}','DishController@edit');
Route::post('dish/update','DishController@update');
Route::get('dish/add_image/{id}','DishController@add_image');
Route::post('dish/insert_image','DishController@insert_image');
Route::get('add_image/edit/{id}','DishController@edit_image');
Route::post('add_image/update','DishController@update_image');
Route::get('add_image/delete/{id}','DishController@delete_image');
//about
Route::post('about/insert','AboutController@insert');
Route::get('about/edit/{id}','AboutController@edit');
Route::post('about/update','AboutController@update');
Route::get('about/delete/{id}','AboutController@delete');

//slider
Route::post('slider/insert','SliderController@insert');
Route::get('slider/edit/{id}','SliderController@edit');
Route::post('slider/update','SliderController@update');
Route::get('slider/delete/{id}','SliderController@delete');


//deal 
Route::post('deal/insert','DealController@insert');
Route::get('deal/edit/{id}','DealController@edit');
Route::post('deal/update','DealController@update');

});

//frontend
Route::get('/','FrontendController@home');
Route::get('contact','FrontendController@contact');
Route::get('frontend/detail/{id}','FrontendController@detail');
Route::get('frontend/d/{id}','FrontendController@d');
Route::get('frontend/cart','FrontendController@cart');
Route::get('frontend/allcategory','FrontendController@allcategory');
Route::post('add-to-cart','FrontendController@addtocart');
Route::get('delete{id}','FrontendController@delete');
Route::get('checkout','FrontendController@checkout');
Route::post('order','FrontendController@placeOrder');
Route::get('thanks','FrontendController@thanks');
Route::get('/search','Frontendcontroller@search_item');
//coupon
Route::post('coupon-code-apply','Frontendcontroller@coupon_code_apply');
// ReviewController
Route::post('add_review','ReviewController@add_review');

// confirm
Route::match(['get','post'],'/confirm/{code}','UserController@confirmAccount');
//forget password
Route::get('forgot_password','UserController@forget');
Route::post('send_forget_mail','UserController@passwordmail');
Route::match(['get','post'],'/reset/{code}','UserController@mailsent');
Route::post('passwordupdate','UserController@passwordupdate');
Route::get('admin/forgot_password','AdminController@forget_password');
Route::post('admin/send_forget_mail','AdminController@passwordmail');
Route::match(['get','post'],'admin/reset/{code}','AdminController@mailsent');
Route::post('admin/passwordupdate','AdminController@passwordupdate');



//register
Route::get('user_register','UserController@user_register');
Route::post('save-user-registration','UserController@insert_register');

//login
Route::get('user_login','UserController@user_login');
Route::get('l','UserController@l');
Route::post('login_insert','UserController@login_insert');
//logout
Route::get('logout','UserController@logout');

//update qunatity
Route::get('cart/update_quantity/{id}/{d}','FrontendController@update_quantity');

//paytm
Route::post('/paytm-callback', 'FrontendController@paytmCallback');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/dashboard','AdminController@dashboard');
Route::get('/auth/redirect/{provider}', 'GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'GoogleLoginController@callback');

//middleware
Route::group(['middleware' =>['Frontlogin']],function() 
{
Route::get('myaccount','FrontendController@myaccount');
Route::get('orderitem','FrontendController@orderitem');
Route::get('address','FrontendController@address');
Route::post('edit_address','FrontendController@edit_address');
});    



//cache clear
Route::get('/clear', function() { 
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear'); 
        return "Cleared!"; 
    });


