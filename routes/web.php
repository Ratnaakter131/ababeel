<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\{CartController, ProfileController,CategoryController, CheckoutController, CouponController, FrontendController, VendorController, ProductController, WishlistController};

Auth::routes();

Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('product/details/{slug}', [FrontendController::class, 'productdetails'])->name('product.details');
Route::get('category/wise/{category_id}', [FrontendController::class, 'categorywiseproducts'])->name('categorywise.products');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/email/offer', [HomeController::class, 'emailoffer'])->name('emailoffer');

Route::get('/location', [HomeController::class, 'location'])->name('location');

Route::post('/location/update', [HomeController::class, 'location_update'])->name('location.update');

Route::get('/single/email/offer/{id}', [HomeController::class, 'singleemailoffer'])->name('singleemailoffer');

Route::post('/check/email/offer', [HomeController::class, 'checkemailoffer'])->name('checkemailoffer');
// password reset
Route::get('/pass/reset/req', [HomeController::class, 'pass_reset'])->name('pass_reset_req');
// password reset
Route::post('/pass/reset/store', [HomeController::class, 'pass_reset_store'])->name('pass.reset.store');

Route::get('/pass/reset/form/{token}', [HomeController::class, 'pass_reset_form'])->name('pass.reset.form');

Route::post('/pass/reset/update', [HomeController::class, 'pass_reset_update'])->name('pass.reset.update');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/name/change', [ProfileController::class, 'namechange'])->name('profile.namechange');
Route::post('/profile/password/change', [ProfileController::class, 'changepassword'])->name('profile.changepassword');
Route::post('/profile/photo/change', [ProfileController::class, 'photochange'])->name('profile.photochange');
Route::resource('category', CategoryController::class);
Route::resource('vendor', VendorController::class);
Route::resource('product', ProductController::class);
Route::resource('Wishlist', WishlistController::class);
Route::resource('coupon', CouponController::class);
Route::get('/Wishlist/insert/{product_id}', [WishlistController::class, 'insert'])->name('wishlist.insert');
Route::get('/Wishlist/remove/{wishlist_id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/addtocardfromwishlist/{wishlist_id}', [CartController::class, 'addtocardfromwishlist'])->name('addtocardfromwishlist');
Route::post('/add/to/cart/{product_id}', [CartController::class, 'addtocart'])->name('addtocart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/clear/shopping/cart/{user_id}', [CartController::class, 'clearshoppingcart'])->name('clearshoppingcart');
Route::get('/cart/remove/{card_id}', [CartController::class, 'cartremove'])->name('cartremove');
Route::post('/cart/update', [CartController::class, 'cartupdate'])->name('cartupdate');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout/post', [CheckoutController::class, 'checkout_post'])->name('checkout_post');
Route::post('/get/city/list', [CheckoutController::class, 'get_city_list'])->name('get_city_list');
