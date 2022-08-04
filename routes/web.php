<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\categorycontroler;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\HomeCustomercontroller;
use App\Http\Controllers\HomeCartController;
use App\Http\Controllers\HomeOrderController;


//a bị chạy hai lần vào app kìa
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

Route::get('/',[Homecontroller::class ,'home'])->name('home');
Route::get('category/{cat}',[Homecontroller::class ,'category'])->name('home.category');
Route::get('product-detail/{product}-{slug}',[Homecontroller::class ,'product'])->name('home.prodetail');
    

Route::get('admin/login',[admincontroller::class, 'login'])->name('admin.login');
Route::get('admin/logout',[admincontroller::class, 'logout'])->name('admin.logout');
Route::post('admin/login',[admincontroller::class, 'check_login']);

Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){
    Route::get('',[admincontroller::class, 'index'])->name('index1');
    Route::group(['prefix' => 'category'], function(){
        Route::get('/',[categorycontroler::class, 'category'] )->name('category1');
        Route::get('create',[categorycontroler::class, 'create'])->name('create1');
        Route::post('store',[categorycontroler::class, 'store'])->name('store1');
        Route::get('edit/{cat}',[categorycontroler::class, 'edit'])->name('edit1');
        Route::put('update/{cat}',[categorycontroler::class, 'update'])->name('update1');
        Route::delete('delete/{cat}',[categorycontroler::class, 'delete'])->name('delete1');   
    });
    Route::resources([
        'product' => Productcontroller::class 
    ]);
});
Route::group(['prefix' =>'product'], function(){
    Route::delete('delete-all',[ProductController::class, 'deleteAll'])->name('product.deleteAll');
});

Route::group(['prefix' => 'customer'], function(){
    Route::get('/login',[HomeCustomercontroller::class, 'login'])->name('home.login');
    Route::post('/login',[HomeCustomercontroller::class, 'check_login']);
    Route::get('/register',[HomeCustomercontroller::class, 'register'])->name('home.register');
    Route::post('/register',[HomeCustomercontroller::class, 'check_register']);
    Route::get('/logout',[HomeCustomercontroller::class, 'logout'])->name('home.logout');
 

}); 
Route::group(['prefix' => 'cart','middleware' => 'cus'], function(){
    Route::get('/add/{product}',[HomeCartController::class, 'add'])->name('cart.add');
    Route::get('/remove/{id}',[HomeCartController::class, 'remove'])->name('cart.remove');
    Route::get('/update/{id}',[HomeCartController::class, 'update'])->name('cart.update');
    Route::post('/update-all',[HomeCartController::class, 'updateall'])->name('cart.updateall');
    Route::get('/clear',[HomeCartController::class, 'clear'])->name('cart.clear');
    Route::get('/view',[HomeCartController::class, 'view'])->name('cart.view');
}); 
Route::group(['prefix' => 'Order','middleware' => 'cus'], function(){
    Route::get('/checkout',[HomeOrderController::class, 'checkout'])->name('order.checkout');
    Route::post('/checkout',[HomeOrderController::class, 'post_checkout']);
    
    Route::get('/history',[HomeOrderController::class, 'update'])->name('order.history');
    Route::post('/detail/{id}',[HomeOrderController::class, 'updateall'])->name('order.detail');
    Route::get('/success',[HomeOrderController::class, 'success'])->name('order.success');
}); 