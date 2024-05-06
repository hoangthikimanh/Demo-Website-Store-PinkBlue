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
//frontend
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/trang-chu','App\Http\Controllers\HomeController@index');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');


//Customer

Route::get('/customer-info','App\Http\Controllers\OrderController@customer_info');


//Order-place
Route::get('/show-order','App\Http\Controllers\OrderController@show_order');
Route::get('/order-list','App\Http\Controllers\OrderController@order_list');
// Route::get('/all-orders','App\Http\Controllers\OrderController@all_orders');
//danh-muc-san-pham trang chủ
Route::get('/danh-muc-san-pham/{category_id}','App\Http\Controllers\CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','App\Http\Controllers\BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','App\Http\Controllers\ProductController@details_product');

//backend:admin
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');

Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::post('/search-admin-product','App\Http\Controllers\AdminController@search_admin_product');
 
//Category Product 
Route::get('/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@delete_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@active_category_product');

Route::post('/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@update_category_product');

//Brand Product 
Route::get('/add-brand-product','App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@delete_brand_product');
Route::get('/all-brand-product','App\Http\Controllers\BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@active_brand_product');

Route::post('/save-brand-product','App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@update_brand_product');

//Product 
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/edit-product/{product_id}','App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product');

Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@active_product');
Route::get('/all-pages-product','App\Http\Controllers\ProductController@all_pages_product');

Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{product_id}','App\Http\Controllers\ProductController@update_product');
//Coupon
Route::post('/check-coupon', 'App\Http\Controllers\CartController@check_coupon');

Route::get('/insert-coupon','App\Http\Controllers\CouponController@insert_coupon'); //quản lý coupon admin
Route::get('/delete-coupon/{coupon_id}','App\Http\Controllers\CouponController@delete_coupon'); //quản lý coupon admin
Route::get('/list-coupon','App\Http\Controllers\CouponController@list_coupon'); //quản lý coupon admin
Route::post('/insert-coupon-code','App\Http\Controllers\CouponController@insert_coupon_code'); //quản lý coupon admin
Route::get('/get-coupons', 'App\Http\Controllers\CouponController@getCoupons');

Route::post('/update-cart', 'App\Http\Controllers\CartController@updateCart');
Route::post('/check-coupon', 'App\Http\Controllers\CartController@check_coupon');
Route::get('/calculate-discount', 'App\Http\Controllers\CartController@calculateDiscount');
Route::post('/apply-coupon', 'App\Http\Controllers\CouponController@apply_coupon');

// Nếu bạn tách `calculateDiscount` thành function riêng:
Route::get('/calculate-discount', 'CartController@calculateDiscount');

//Cart
Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_quantity');
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::get('/gio-hang','App\Http\Controllers\CartController@gio_hang');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
Route::get('/del-all-product','App\Http\Controllers\CartController@del_all_product');
Route::post('/check-coupon','App\Http\Controllers\CartController@check_coupon'); //ở trang web user
Route::get('/remove-coupon/{key}', 'App\Http\Controllers\CartController@removeCoupon');
Route::get('/apply-coupon', 'App\Http\Controllers\CartController@apply_coupon');




//Checkout
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');

Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::post('/order-place','App\Http\Controllers\CheckoutController@order_place');
Route::get('/save-customer-info','App\Http\Controllers\CheckoutController@save_customer_info');

Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
Route::post('/save-checkout-customer','App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');
Route::get('/editCustomerInformation/{customerId}','App\Http\Controllers\CheckoutController@editCustomerInformation');
Route::get('/get-bill/{orderId}', 'App\Http\Controllers\CheckoutController@get_bill');


//Order
Route::get('/manage-order','App\Http\Controllers\CheckoutController@manage_order');
Route::get('/view-order/{orderId}','App\Http\Controllers\CheckoutController@view_order');
Route::get('/delete-order/{order_id}', 'App\Http\Controllers\OrderController@deleteOrder');
Route::get('/add-order', 'App\Http\Controllers\OrderController@add_order');
Route::get('/search-customer-admin', 'App\Http\Controllers\OrderController@search');
Route::get('/print-order/{checkout_code}', 'App\Http\Controllers\OrderController@print_order');



//
Route::post('/filter-orders', 'App\Http\Controllers\AdminController@filterOrders');


//Delivery

Route::get('/delivery','App\Http\Controllers\DeliveryController@delivery');
Route::post('/select-delivery','App\Http\Controllers\DeliveryController@select_delivery');
Route::post('/insert-delivery','App\Http\Controllers\DeliveryController@insert_delivery');
Route::post('/select-feeship','App\Http\Controllers\DeliveryController@select_feeship');
Route::post('/update-delivery','App\Http\Controllers\DeliveryController@update_delivery');
