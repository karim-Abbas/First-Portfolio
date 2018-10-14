<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

					//Products
//Show products in 'Home Page'.
Route::get('/products', 'HomeController@show_product');
//end
//Show products in 'my product page'.
Route::get('/my_products', 'ProductController@my_products');
//end

				  //End Products

					//Dashboard
//Show Users & Products Tables.
Route::get('/dashboard', 'AdminController@dashboard');
//end
//Add Users.
Route::post('/add_user', 'AdminController@store');
//end
//Delete Users.
Route::get('/delete_user/{id}', 'AdminController@delete_user');
//end
//Delete products.
Route::get('/delete_product1/{id}', 'AdminController@delete_product');
//end
					//End Dashboard

					//My Products
//Add products.
Route::post('/add_product', 'ProductController@add_product');
//end
//Delete products.
Route::get('/delete_product2/{id}', 'ProductController@delete_product');
//end
//Update product
Route::get('/update_product/{id}', 'ProductController@edit');
Route::post('/update_product/{id}', 'ProductController@update');
//end
//Show Product Details
Route::get('/showdetails/{id}', 'ProductController@showdetails');
//end
					//End My Products
						//Profile
//Show profile
Route::get('profile', 'UserController@profile');
//end
//Update Avatar
Route::post('profile', 'UserController@update_avatar');
//end
					//End Profile
						//Orders
//Show Orders.
Route::get('orders', 'OrderController@index');
//end
//Buy Orders.
Route::get('/buy/{id}', 'OrderController@store');
//end
//Delete Orders.
Route::get('/delete_order/{id}', 'OrderController@destroy');
//end
