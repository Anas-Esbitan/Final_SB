<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\SubscriptionController;
Route::get('/about', function () {
    return view('userside.about');
})->name('about');
//
Route::get('/contact', function () {
    return view('userside.contact');
})->name('contact');
//
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
//----------------------------------------------------------------------
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.dashboard');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
//===========================================================
Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    // Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.remove');


});


//=======================================================
 Route::middleware(['auth', 'user'])->get('user-profile', [UserProfileController::class, 'showProfile'])->name('user.profile');
 // Route لعرض صفحة التعديل
Route::middleware(['auth', 'user'])->get('user-profile/edit', [UserProfileController::class, 'editProfile'])->name('user.profile.edit');

// Route لتحديث بيانات الملف الشخصي
Route::middleware(['auth', 'user'])->put('user-profile/update', [UserProfileController::class, 'updateProfile'])->name('user.profile.update');
Route::get('product/{id}', [UserProfileController::class, 'show'])->name('product.show');
 //===================================================================
Route::get('/', [PublicProductController::class, 'index'])->name('/');

Route::get('/products/create', [PublicProductController::class, 'create'])->name('product.create');

// لتخزين المنتج الجديد
Route::post('/products', [PublicProductController::class, 'store'])->name('product.store');

// لتعديل المنتج\
    Route::delete('/products/{product}', [PublicProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}/edit', [PublicProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [PublicProductController::class, 'update'])->name('products.update');

//=================================================
Route::get('/product/{id}', function ($id) {
    $product = Product::with('images')->findOrFail($id); 
    return view('userside.product-details', compact('product'));
})->name('product.details');

Route::get('/user-chart', [MainController::class, 'chart']);
Route::get('/category/{id}', [PublicProductController::class, 'showByCategory'])
     ->name('category.products');
Auth::routes();
 // Dashboard Route
// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

   
 Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Categories Routes---------------------------
    // Route::get('category', [CategoriesController::class, 'index']);
    // Route::get('add-category', [CategoriesController::class, 'create']);
    // Route::post('add-category', [CategoriesController::class, 'store']);    
    // Route::get('edit-category/{category_id}', [CategoriesController::class, 'edit']); 
    // Route::put('update-category/{category_id}', [CategoriesController::class, 'update']);
    // Route::delete('delete-category/{category_id}', [CategoriesController::class, 'destroy'])->name('category.destroy') ; 

    // Users CRUD Routes
    // Route::get('users', [UserController::class, 'index'])->name('admin.users');
    // Route::get('add-user', [UserController::class, 'create'])->name('admin.add-user');
    // Route::post('store-user', [UserController::class, 'store'])->name('admin.store-user');
    // Route::get('edit-user/{user_id}', [UserController::class, 'edit'])->name('admin.edit-user');
    // Route::put('update-user/{user_id}', [UserController::class, 'update'])->name('admin.update-user');
    // Route::delete('delete-user/{user_id}', [UserController::class, 'destroy'])->name('admin.delete-user');

    // Product CRUD 

    // Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    // Route::get('add-product', [ProductController::class, 'create'])->name('admin.create-product');
    // Route::post('store-product', [ProductController::class, 'store'])->name('admin.store-product'); 
    // Route::get('edit-product/{product_id}', [ProductController::class, 'edit'])->name('admin.edit-product'); 
    // Route::put('update-product/{product_id}', [ProductController::class, 'update'])->name('admin.update-product');
    // Route::delete('delete-product/{product_id}', [ProductController::class, 'destroy'])->name('admin.delete-product');

    // orders CRUD =========================================================
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');

    Route::get('orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
    Route::post('orders', [OrderController::class, 'store'])->name('admin.orders.store');

    Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    
    Route::put('orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');


    Route::resource('subscriptions', SubscriptionController::class)->middleware(['auth', 'isAdmin']);

});
// Routes for Users
Route::middleware(['auth:web'])->group(function () {
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


    Route::get('/user-profile', [UserProfileController::class, 'showProfile'])->name('user.profile');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    // إضافة باقي الـ Routes الخاصة باليوزر هنا
});

// Routes for Admins
Route::prefix('admin')->middleware(['auth:admin', 'isAdmin'])->group(function () {
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // proudacts
    Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('add-product', [ProductController::class, 'create'])->name('admin.create-product');
    Route::post('store-product', [ProductController::class, 'store'])->name('admin.store-product'); 
    Route::get('edit-product/{product_id}', [ProductController::class, 'edit'])->name('admin.edit-product'); 
    Route::put('update-product/{product_id}', [ProductController::class, 'update'])->name('admin.update-product');
    Route::delete('delete-product/{product_id}', [ProductController::class, 'destroy'])->name('admin.delete-product');
    // إضافة باقي الـ Routes الخاصة بالأدمن هنا Users
      Route::get('users', [UserController::class, 'index'])->name('admin.users');
    Route::get('add-user', [UserController::class, 'create'])->name('admin.add-user');
    Route::post('store-user', [UserController::class, 'store'])->name('admin.store-user');
    Route::get('edit-user/{user_id}', [UserController::class, 'edit'])->name('admin.edit-user');
    Route::put('update-user/{user_id}', [UserController::class, 'update'])->name('admin.update-user');
    Route::delete('delete-user/{user_id}', [UserController::class, 'destroy'])->name('admin.delete-user');

      Route::get('orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
      Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');


      //Categories
    Route::get('category', [CategoriesController::class, 'index']);
    Route::get('add-category', [CategoriesController::class, 'create']);
    Route::post('add-category', [CategoriesController::class, 'store']);    
    Route::get('edit-category/{category_id}', [CategoriesController::class, 'edit']); 
    Route::put('update-category/{category_id}', [CategoriesController::class, 'update']);
    Route::delete('delete-category/{category_id}', [CategoriesController::class, 'destroy'])->name('category.destroy') ; 
     
     
});