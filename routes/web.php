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

Auth::routes();
Route::get('/', 'PageController@index');
Route::get('/index', 'PageController@index');
Route::get('/home', 'PageController@index');
Route::get('/search-products/{search_string}', 'PageController@searchProducts');
Route::post('/search-products', 'PageController@postSearchProducts');

Route::get('/product-details/{product_id}', 'PageController@productDetails');

Route::post('/add-to-cart', 'CartController@postAddToCart');

Route::get('/cart', 'CartController@cart');
Route::post('/update-quantity', 'CartController@postUpdateQuantity');
Route::post('/remove-item-from-cart', 'CartController@postRemoveItemFromCart');
Route::get('/remove-all-items-from-cart', 'CartController@removeAllItemsFromCart');
Route::get('/checkout', 'CartController@checkout');
Route::post('/place-order', 'CartController@postPlaceOrder');
Route::get('/my-orders', 'CartController@myOrders');

Route::get('/manage-products', 'ManageProductsController@index');
Route::post('/update-stock', 'ManageProductsController@postUpdateStock');
Route::post('/update-price', 'ManageProductsController@postUpdatePrice');
Route::post('/edit-product-info', 'ManageProductsController@postEditProductInfo');
Route::post('/update-product-info', 'ManageProductsController@postUpdateProductInfo');
Route::post('/delete-product', 'ManageProductsController@postDeleteProduct');
Route::get('/create-new-product', 'ManageProductsController@createNewProduct');
Route::post('/create-new-product', 'ManageProductsController@postCreateNewProduct');

Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');


Route::get('/test', 'CartController@test');