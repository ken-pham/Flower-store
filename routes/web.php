<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\speciesController;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu ', [HomeController::class, 'index']);
Route::get('/yeu-thich ', [HomeController::class, 'yeu_thich']);
Route::post('/add-yeu-thich ', [HomeController::class, 'add_yeu_thich']);
Route::post('/bo-yeu-thich ', [HomeController::class, 'bo_yeu_thich']);
Route::post('/ok ', [CheckoutController::class, 'oke']);
Route::post('/Tim-kiem ', [HomeController::class, 'search']);

//danh muc san pham
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/su-kien/{event_id}', [eventController::class, 'show_event_home']);
Route::get('/loai-hoa/{species_id}', [speciesController::class, 'show_species_home']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'show_chi_tiet']);

//backend
Route::get('/admin', [AdminController::class, 'index'] );
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin_dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/all-order', [AdminController::class, 'show_order'] );
Route::get('/chi-tiet/{order_id}', [AdminController::class, 'chitiet'] );

//Category Product
Route::get('/add_category', [CategoryProduct::class, 'add_category']);
Route::get('/all_category', [CategoryProduct::class, 'all_category']);
Route::get('/edit-category/{category_id}', [CategoryProduct::class, 'edit_category']);
Route::get('/delete-category/{category_id}', [CategoryProduct::class, 'delete_category']);

Route::get('/unactive-category-product/{category_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_id}', [CategoryProduct::class, 'active_category_product']);


Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_id}', [CategoryProduct::class, 'update_category']);

//species
Route::get('/add_species', [speciesController::class, 'add_species']);
Route::get('/all_species', [speciesController::class, 'all_species']);
Route::get('/edit-species/{species_id}', [speciesController::class, 'edit_species']);
Route::get('/delete-species/{species_id}', [speciesController::class, 'delete_species']);

Route::get('/unactive-species-product/{species_id}', [speciesController::class, 'unactive_species_product']);
Route::get('/active-species-product/{species_id}', [speciesController::class, 'active_species_product']);


Route::post('/save-species-product', [speciesController::class, 'save_species_product']);
Route::post('/update-species-product/{species_id}', [speciesController::class, 'update_species']);

//event
Route::get('/add_event', [eventController::class, 'add_event']);
Route::get('/all_event', [eventController::class, 'all_event']);
Route::get('/edit-event/{event_id}', [eventController::class, 'edit_event']);
Route::get('/delete-event/{event_id}', [eventController::class, 'delete_event']);

Route::get('/unactive-event-product/{event_id}', [eventController::class, 'unactive_event_product']);
Route::get('/active-event-product/{event_id}', [eventController::class, 'active_event_product']);


Route::post('/save-event-product', [eventController::class, 'save_event_product']);
Route::post('/update-event-product/{event_id}', [eventController::class, 'update_event']);


//Product
Route::get('/add_product', [ProductController::class, 'add_product']);
Route::get('/all_product', [ProductController::class, 'all_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);

Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);


Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowID}', [CartController::class, 'delete_to_cart']);
Route::post('/update-qty-cart', [CartController::class, 'update_qty_cart']);

Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/login', [CheckoutController::class, 'login']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/save-checkout-custommer', [CheckoutController::class, 'save_checkout_custommer']);
Route::get('/payment', [CheckoutController::class, 'payment']);