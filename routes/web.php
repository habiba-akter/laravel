<?php

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

Route::get('/', 'welcomeController@index');
Route::get('/showcategory/{id}', 'welcomeController@newFunction');
Route::get('/product-details/{id}/{name}', 'welcomeController@productDetails');


/*Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/category/add', 'CategoryController@index');
Route::post('/category/new', 'CategoryController@saveCategory');
Route::get('/category/manage', 'CategoryController@manageCategory');
Route::get('/category/unpublished/{id}', 'CategoryController@unpublishedCategory');
Route::get('/category/published/{id}', 'CategoryController@publishedCategory');
Route::get('/category/edit/{id}','CategoryController@editCategory');
Route::post('/category/update','CategoryController@updateCategory');
Route::get('/category/delete/{id}','CategoryController@deleteCategory');

Route::group(['prefix' => 'manufacturer'],function(){
   Route::get('/add','ManufacturerController@index')->name('add-manufacturer');
   Route::get('/manage','ManufacturerController@manageManufacturer')->name('manage-manufacturer');
   Route::post('/new','ManufacturerController@saveManufacturer')->name('new-manufacturer');
   Route::post('/manufacturer/unpublished','ManufacturerController@unpublishedManufacturer')->name('unpublished-manufacturer');
   Route::post('/published','ManufacturerController@publishedManufacturer')->name('published-manufacturer');
   Route::post('/edit','ManufacturerController@editManufacturer')->name('edit-manufacturer');
   Route::post('/update','ManufacturerController@updateManufacturer')->name('update-manufacturer');
   Route::post('/delete','ManufacturerController@deleteManufacturer')->name('delete-manufacturer');
});

Route::group(['prefix' => 'product'],function(){
   Route::get('/add','ProductController@index')->name('add-product');
   Route::post('/new','ProductController@saveProduct')->name('new-product');
   Route::get('/manage','ProductController@manageProduct')->name('manage-product')->middleware('AuthenticateMiddleware');
   Route::get('/published','ProductController@manageProduct')->name('published-product');
   Route::get('/unpublished','ProductController@manageProduct')->name('unpublished-product');
   Route::get('/edit','ProductController@manageProduct')->name('edit-product');
   Route::post('/delete','ProductController@deleteProduct')->name('delete-product');

});

 Route::post('/add-to-cart','CartController@index');
 Route::get('/show-cart','CartController@cartView');
 Route::post('/update-cart','CartController@updateCart');
 Route::get('/remove-cart-product/{id}','CartController@removeCartProduct');
 Route::get('/checkout','CheckoutController@index');
Route::post('/new-customer','CheckoutController@newCustomer');
Route::get('/shipping-info','CheckoutController@shippingInfo');
Route::get('/user-logout','CheckoutController@userLogout');
Route::post('/new-shipping','CheckoutController@newShipping');
Route::get('/payment-info','CheckoutController@paymentInfo');
Route::post('/user-login','CheckoutController@userLogin');
Route::post('/new-order','CheckoutController@saveOrderInfo');
Route::get('/customer-home','CheckoutController@customerHome');
Route::get('/manage-order','OrderController@index');
