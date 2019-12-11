<?php


use App\Http\Controllers\BrandController;

Route::get('/','EiserController@index')->name('/');



Route::get('/category/{id}/{name}','EiserController@category')->name('category');
Route::get('/product-details/{id}','EiserController@productDetails')->name('product-details');

Route::post('/cart','CartController@addCart')->name('add-cart');
Route::get('/cart','CartController@viewCart');
Route::get('/cart/delete/{id}','CartController@deleteCart')->name('delete-cart');
Route::post('/cart/update','CartController@updateCart')->name('edit-cart');

Route::get('/checkout','CheckoutController@index')->name('checkout');
Route::post('/checkout/sign-up','CheckoutController@signUp')->name('checkout-sign-up');

Route::post('/checkout/customer-login','CheckoutController@customerLoginCheck')->name('customer-login');
Route::post('/checkout/customer-logout','CheckoutController@customerLogout')->name('customer-logout');
Route::get('/checkout/new-customer-login','CheckoutController@newCustomerLogin')->name('new-customer-login');



Route::get('/checkout/shipping','CheckoutController@shipping');
Route::post('/checkout/shipping','CheckoutController@saveShippingInfo')->name('new-shipping');
Route::get('/checkout/payment','CheckoutController@paymentForm');
Route::post('/checkout/order','CheckoutController@newOrder')->name('new-order');
Route::get('/checkout/payment/confirm','CheckoutController@confirmPayment');

Route::get('/checkout/payment/stripe', 'CheckoutController@stripe');
Route::post('/stripe', 'CheckoutController@stripePost')->name('stripe.post');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//start category

Route::get('/category/add', 'CategoryController@addCategory')->name('add-category');
Route::post('/category/new','CategoryController@newCategory')->name('new-category');
Route::get('/category/manage','CategoryController@manageCategory')->name('manage-category');
Route::get('/category/published/{id}','CategoryController@publishedCategory')->name('published-category');
Route::get('/category/unpublished/{id}','CategoryController@unpublishedCategory')->name('unpublished-category');
Route::post('/category/update','CategoryController@updateCategory')->name('update-category');
Route::get('/category/delete/{id}','CategoryController@deleteCategory')->name('delete-category');

//end category


//start brand

Route::get('/brand/add','BrandController@addBrand')->name('add-brand');
Route::post('/brand/new','BrandController@newBrand')->name('new-brand');
Route::get('/brand/view','BrandController@viewBrand')->name('view-brand');
Route::get('/brand/published/{id}','BrandController@publishedBrand')->name('published-brand');
Route::get('/brand/unpublished/{id}','BrandController@unpublishedBrand')->name('unpublished-brand');
Route::post('/brand/update','BrandController@updateBrand')->name('edit-brand');
Route::get('/brand/delete/{id}','BrandController@deleteBrand')->name('delete-brand');

//end brand

//Product Route Start Section

Route::get('/product/add','ProductController@addProduct')->name('add-product');
Route::post('/product/new','ProductController@newProduct')->name('new-product');
Route::get('/product/view','ProductController@viewProduct')->name('view-product');
Route::post('/product/update/{id}','ProductController@updateProduct')->name('update-product');
Route::get('/product/delete/{id}','ProductController@deleteProduct')->name('delete-product');


//Product Route End Section

Route::get('/order/manage-order','OrderController@manageOrderInfo')->name('manage-order');
Route::get('/order/view-order-detail/{id}','OrderController@viewOrderDetail')->name('view-order-detail');
Route::get('/order/view-order-invoice/{id}','OrderController@viewOrderInvoice')->name('view-order-invoice');
Route::get('/order/download-order-invoice/{id}','OrderController@downloadOrderInvoice')->name('download-order-invoice');

