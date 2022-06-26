<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController\AuthController;
use App\Http\Controllers\AdminController\BrandController;

use App\Http\Controllers\ClientController\UserController;


use App\Http\Controllers\AdminController\MobileController;
use App\Http\Controllers\ClientController\OrderController;
use App\Http\Controllers\AdminController\ArticleController;
use App\Http\Controllers\ClientController\PayPalController;

use App\Http\Controllers\AdminController\CategoryController;

use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\AdminController\UserControllerAdmin;
use App\Http\Controllers\ClientController\FeedbackController;
use App\Http\Controllers\ClientController\SendMailController;
use App\Http\Controllers\AdminController\OrderControllerAdmin;
use App\Http\ExportExcelController\ExportExcelBrandController;
use App\Http\ExportExcelController\ExportExcelOrderController;
use App\Http\Controllers\AdminController\OrderDetailController;

use App\Http\Controllers\ClientController\MobileShopController;
use App\Http\ExportExcelController\ExportExcelMobileController;
use App\Http\Controllers\AdminController\FeedbackControllerAdmin;
use App\Http\Controllers\ClientController\AuthCustomerController;
use App\Http\Controllers\ClientController\ShoppingCartController;
use App\Http\ExportExcelController\ExportExcelCategoryController;
use App\Http\Controllers\ClientController\MobileArticleController;

#Route admin




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
#auth
Route::get('/', function () {
    $mobile_on_sale = \App\Models\Mobile::query()->select('*')->where('status', '=', 2)->get();
    $mobile_latest = \App\Models\Mobile::query()->select('*')->orderBy('created_at','desc')->get()->take(16);
    $article = \App\Models\Article::query()->select('*')->orderBy('created_at','desc')->get()->take(12);
    $mobiles_apple = \App\Models\Mobile::query()->select('*')->where('brandID', '=', 1)->orderBy('created_at','desc')->get();    
    $mobiles_ss = \App\Models\Mobile::query()->select('*')->where('brandID', '=', 2)->orderBy('created_at','desc')->get();    
    $mobiles_xiaomi = \App\Models\Mobile::query()->select('*')->where('brandID', '=', 3)->orderBy('created_at','desc')->get();    
    $mobiles_nokia = \App\Models\Mobile::query()->select('*')->where('brandID', '=', 4)->orderBy('created_at','desc')->get();    
    $mobiles_realme = \App\Models\Mobile::query()->select('*')->where('brandID', '=', 5)->orderBy('created_at','desc')->get();    
    $mobiles_vivo = \App\Models\Mobile::query()->select('*')->where('brandID', '=', 8)->orderBy('created_at','desc')->get();    
    $mobiles_oppo = \App\Models\Mobile::query()->select('*')->where('brandID', '=', 9)->orderBy('created_at','desc')->get(); 
    $mobiles_asus = \App\Models\Mobile::query()->select('*')->where('brandID', '=', 6)->orderBy('created_at','desc')->get();    
    return view('client.page.home')->with('mobile_on_sale', $mobile_on_sale)->with('mobile_latest', $mobile_latest)->with('article', $article)
                                    ->with('mobiles_apple', $mobiles_apple)->with('mobiles_ss', $mobiles_ss)->with('mobiles_xiaomi', $mobiles_xiaomi)
                                    ->with('mobiles_nokia', $mobiles_nokia)
                                    ->with('mobiles_realme', $mobiles_realme)
                                    ->with('mobiles_vivo', $mobiles_vivo)
                                    ->with('mobiles_oppo', $mobiles_oppo)
                                    ->with('mobiles_asus', $mobiles_asus);
})->name('client.home');

//Admin Route after authentication
Auth::routes();
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home.dashboard');
    #user
    Route::post('/update/user', [UserControllerAdmin::class, 'update'])->name('User.Info.Update');
    Route::delete('/users_admin/deleteAll', [UserControllerAdmin::class, 'deleteAll']);
    Route::get('/users_admin/fetch_data', [UserControllerAdmin::class, 'fetch_data']);
    Route::resource('user_admin', UserControllerAdmin::class)->parameters([
        'user_admin' => 'user_admin_id'
    ]);
    #category
    Route::delete('/category/deleteAll', [CategoryController::class, 'deleteAll']);
    Route::get('/category/fetch_data', [CategoryController::class, 'fetch_data']);
    Route::resource('category', CategoryController::class)->parameters([
        'category' => 'category_id'
    ]);
    #brand
    Route::delete('/brand/deleteAll', [BrandController::class, 'deleteAll']);
    Route::get('/brand/search', [BrandController::class, 'search']);
    Route::get('/brand/fetch_data', [BrandController::class, 'fetch_data']);
    Route::resource('brand', BrandController::class)->parameters([
        'brand' => 'brand_id'
    ]);
    //all product start here -------------------------------------------------------
    //1. mobile
    Route::get('/mobile/fetch_data', [MobileController::class, 'fetch_data']);    
    Route::delete('/mobile/deleteAll', [MobileController::class, 'deleteAll']);
    Route::resource('mobile', MobileController::class)->parameters([
        'mobile' => 'mobile_id'
    ]);
    #4. order
    Route::delete('/order/deleteAll', [OrderControllerAdmin::class, 'deleteAll']);
    Route::get('/order/fetch_data', [OrderControllerAdmin::class, 'fetch_data']);
    Route::resource('orders', OrderControllerAdmin::class)->parameters([
        'orders' => 'order_id'
    ]);
    #5. user
    Route::delete('/user/deleteAll', [UserControllerAdmin::class, 'deleteAll']);
    Route::resource('user', UserControllerAdmin::class)->parameters([
        'user' => 'user_id'
    ]);
    #6. order-detail
    Route::delete('/order-detail/deleteAll', [OrderDetailController::class, 'deleteAll']);
    Route::get('/order-detail/fetch_data', [OrderDetailController::class, 'fetch_data']);
    Route::resource('order-detail', OrderDetailController::class)->parameters([
        'order-detail' => 'order-detail_id'
    ]);

    #7. Export Excel Admin
    Route::get('/export-excel/excel/category', [ExportExcelCategoryController::class, 'excel']);
    #Export excel Brand
    Route::get('/export-excel/excel/brand', [ExportExcelBrandController::class, 'excel']);
    #Export excel Order
    Route::get('/export-excel/excel/order', [ExportExcelOrderController::class, 'excel']);
    #Export excel Mobile
    Route::get('/export-excel/excel/mobile', [ExportExcelMobileController::class, 'excel']);
    #8. Feedback
    Route::delete('/feedback/deleteAll', [FeedbackControllerAdmin::class, 'deleteAll']);
    Route::get('/feedback/fetch_data', [FeedbackControllerAdmin::class, 'fetch_data']);
    Route::resource('feedback', FeedbackControllerAdmin::class)->parameters([
        'feedback' => 'feedback_id'
    ]);

    #8. Article
    Route::delete('/article/deleteAll', [ArticleController::class, 'deleteAll']);
    Route::get('/article/fetch_data', [ArticleController::class, 'fetch_data']);
    Route::resource('article', ArticleController::class)->parameters([
        'article' => 'article_id'
    ]);

    Route::get('form', function () {
        return view('admin.template.form');
    });
    Route::get('table', function () {
        return view('admin.template.table_data');
    });

});

//Login Admin
Route::group([
    'prefix' => 'auth',
    'middleware' => ['check.after.admin.login']
],function(){
    Route::get('/adminlogin', [AuthController::class, 'adminGetLogin'])->name('admin.login');
    Route::post('/adminlogin', [AuthController::class, 'adminPostLogin'])->name('admin.process.login');
});
Route::group([
    'prefix' => 'auth',
    'middleware' => ['auth']
],function(){
    Route::post('/adminlogout', [AuthController::class, 'logout'])->name('admin.process.logout');
    Route::resource('account', AuthController::class)->parameters([
        'auth' => 'auth_id'
    ]);
});

#Route client

Route::group([
    'prefix' => 'client/page',
    'middleware' => ['check.after.customer.login']
], function () {
    Route::get('/login/get', [AuthCustomerController::class, 'customerGetLogin'])->name('customer.login.get');
});

Route::get('/order/detail/{order_id}', [UserController::class, 'showOrderByOrderID'])->name('get.order.byOrderID');

#login require and be user id
Route::group([
    'prefix' => 'client/page',
    'middleware' => ['login_require']
], function () {
    Route::get('/orders/{user_id}', [UserController::class, 'showOrderByID'])->name('get.orders.byID');
});

#login require
Route::group([
    'prefix' => 'client/page',
    'middleware' => ['login_require_only']
], function () {
    Route::resource('user', UserController::class)->parameters([
        'user' => 'user_id'
    ]);
});

#user route
Route::prefix('client/page')->group(function () {

    Route::get('/404', [UserController::class, 'redirect404'])->name('404page');
    #Customer Register
    Route::get('/register/get', [UserController::class, 'getViewCreate'])->name('customer.register.get');
    Route::post('/register/save', [UserController::class, 'saveCreate'])->name('customer.register.save');
    #Customer Login
    Route::post('/login', [AuthCustomerController::class, 'customerPostLogin'])->name('customer.login.post');
    Route::post('/logout', [AuthCustomerController::class, 'logout'])->name('customer.logout');
    #Route resource order
    #thankyou
    Route::get('thankyou/{id}', [OrderController::class, 'show_thankyou'])->name('client.thankyou');
    Route::post('validate', [OrderController::class, 'validateOrder'])->name('validate.order');
    Route::resource('order', OrderController::class)->parameters([
        'order' => 'order_id'
    ]);
    #shop resource
    #feedback
    Route::resource('feedback', FeedbackController::class)->parameters([
        'feedback' => 'feedback_id'
    ]);
    #order resource
    Route::resource('order', OrderController::class)->parameters([
        'order' => 'order_id'
    ]);
    #shop mobile
    Route::post('shop/mobile/fetch_data', [MobileShopController::class, 'fetch_data'])->name('mobile_client.fetch_data');
    Route::post('mobile/search', [MobileShopController::class, 'search_mobile'])->name('mobile_client.search');
    Route::resource('shop/mobile', MobileShopController::class, [
        'names' => [
            'index' => 'mobile_client.index',
            'show' => 'mobile_client.show',
            'store' => 'mobile_client.store',
            'create' => 'mobile_client.create',
            'update' => 'mobile_client.update',
            'edit' => 'mobile_client.edit',
            'destroy' => 'mobile_client.destroy'
        ]
    ]);
    #article
    Route::post('article/fetch_data', [MobileArticleController::class, 'fetch_data'])->name('article_client.fetch_data');
    Route::resource('article', MobileArticleController::class, [
        'names' => [
            'index' => 'article_client.index',
            'show' => 'article_client.show'
        ]
    ]);

    #cart
    Route::prefix('shopping')->group(function () {
        Route::get('cart', [ShoppingCartController::class, 'cartList'])->name('cart.list');
        Route::post('cart', [ShoppingCartController::class, 'addToCart'])->name('cart.store');
        Route::post('update-cart', [ShoppingCartController::class, 'updateCart'])->name('cart.update');
        Route::post('remove', [ShoppingCartController::class, 'removeCart'])->name('cart.remove');
        Route::post('clear', [ShoppingCartController::class, 'clearAllCart'])->name('cart.clear');
    });
    #payPal
    Route::get('/checkout', [PayPalController::class, 'index'])->name('client.checkout');
    Route::get('/checkout-total', [PayPalController::class, 'getTotal'])->name('client.checkout_total');
    #Update order checkout
    Route::post('/update/checkout_order', [OrderController::class, 'update'])->name('order.update.checkout');
    #Address controller
    Route::get('/district', [OrderController::class, 'get_district'])->name('address.district');
    Route::get('/province', [OrderController::class, 'get_province'])->name('address.province');
    Route::get('/ward', [OrderController::class, 'get_ward'])->name('address.Ward');
    #home

    #about
    Route::get('about', function () {
        return view('client.page.about');
    })->name('client.about');
    #privacy policy
    Route::get('privacy', function () {
        return view('client.page.privacy');
    })->name('client.privacy');
    #terms conditions
    Route::get('terms-conditions', function () {
        return view('client.page.terms_conditions');
    })->name('client.terms_conditions');
    # return policy
    Route::get('return-policy', function () {
        return view('client.page.return_policy');
    })->name('client.return_policy');
    #confirm Email
    Route::get('/confirm-email', [SendMailController::class, 'send_email'])->name('client.confirm.email');
});
#route fall back show error page 404!
Route::fallback(function () {
    return view('client.page.error.page_404');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
