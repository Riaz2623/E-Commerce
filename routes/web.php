<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\homeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomesliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;

use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;


use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Controllers\BotManController;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',Homecomponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/shop',ShopComponent::class);
Route::get('/checkout',CheckoutComponent::class)->name('checkout.check');
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');

Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist');

Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');



 
//For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard',UserDashboardcomponent::class)->name('user.dashboard');
    Route ::get('/user/orders',UserOrdersComponent::class)->name('user.orders');
    Route:: get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');
   

    
});



//For Admin
//Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/categories/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/categories/edit/{category_slug}',AdminEditCategorycomponent::class)->name('admin.editcategory');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/products/add',AdminAddProductComponent::class)->name('admin.addproducts');
    Route::get('/admin/products/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproducts');

    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
    Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');
    Route::get('/admin/coupons',AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add',AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}',AdminEditCouponComponent::class)->name('admin.editcoupon');
    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
    Route::get ('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');

//});

Route::match(['get', 'post'],'/botman', [BotManController::class,"handle"]);
