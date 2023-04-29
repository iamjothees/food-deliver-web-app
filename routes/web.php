<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\StaffAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Admin\Controller as AdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HelperController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ReservationRequestController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Pages;
use App\Models\Item;
use App\Models\ReservationRequest;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 


/* Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */
/* Route::get('/', 'PageController@index')->name('index'); */
Route::middleware('guest')->group(function () {
    //Route::get('/', [PageController::class, 'guestIndex'])->name('guest.index');
    Route::get('/login', [UserAuthController::class, 'create'])->name('user.login');
    Route::post('/authenticate', [UserAuthController::class, 'authenticate'])->name('user.authenticate');    
});

Route::middleware('user')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('user.index');
    //Route::get('/home', [PageController::class, 'index'])->name('user.index');
    Route::get('/logout', [UserAuthController::class, 'destroy'])->name('user.logout');
    /* Route::get('/login', [UserAuthController::class, 'create'])->name('user.login');
    Route::post('/authenticate', [UserAuthController::class, 'authenticate'])->name('user.authenticate');     */
});



/* Route::get('/', function(){
    return Inertia::render('index', ['user' => "Dhee"]);
});

Route::get('/login', function(){
    return Inertia::render('auth', ['user' => "Dhee"]);
}); */
Route::middleware('staff')->prefix('/admin')->name('admin.')->group( function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        Route::prefix('/menus')->controller(MenuController::class)->name('menus')->group( function () {
            Route::get('/', 'index')->name('');
            Route::post('/store', 'store')->name('.store');
            Route::post('/update', 'update')->name('.update');
            Route::get('/delete/{menu}', 'destroy')->name('.destroy');    
        });
        
        Route::prefix('/categories')->controller(CategoryController::class)->name('categories')->group( function () {
            Route::get('/', 'index')->name('');
            Route::post('/store', 'store')->name('.store');
            Route::post('/update', 'update')->name('.update');
            Route::get('/delete/{category}', 'destroy')->name('.destroy');    
        });
        
        Route::prefix('/items')->controller(ItemController::class)->name('items')->group( function () {
            Route::get('/', 'index')->name('');
            Route::post('/store', 'store')->name('.store');
            Route::post('/update', 'update')->name('.update');
            Route::get('/delete/{item}', 'destroy')->name('.destroy');    
        });
        
        Route::prefix('/tables')->controller(TableController::class)->name('tables')->group( function () {
            Route::get('/', 'index')->name('');
            Route::post('/store', 'store')->name('.store');
            Route::post('/update', 'update')->name('.update');
            Route::get('/delete/{table}', 'destroy')->name('.destroy');    
        });
        
        Route::prefix('/customers')->controller(CustomerController::class)->name('customers')->group( function () {
            Route::get('/', 'index')->name('');
            Route::post('/store', 'store')->name('.store');
            Route::post('/update', 'update')->name('.update');
            Route::get('/delete/{customer}', 'destroy')->name('.destroy');    
        });
    
       
        
        /* Route::prefix('/menus')->controller(MenuController::class)->name('menus')->group( function () {
            Route::get('/', 'index')->name('');
            Route::post('/store', 'store')->name('.store');
            Route::post('/update', 'update')->name('.update');
            Route::get('/delete/{menu}', 'destroy')->name('.destroy');    
        });
        
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        
        Route::get('/items', [ItemController::class, 'index'])->name('items');
        Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
        Route::post('/items/update', [ItemController::class, 'update'])->name('items.update');
        Route::get('/items/delete/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
        
        Route::get('/tables', [TableController::class, 'index'])->name('tables');
        Route::post('/tables/store', [TableController::class, 'store'])->name('tables.store');
        Route::post('/tables/update', [TableController::class, 'update'])->name('tables.update');
        Route::get('/tables/delete/{table}', [TableController::class, 'destroy'])->name('tables.destroy');
        
        Route::get('/reservations/requests', [ReservationRequestController::class, 'index'])->name('reservations.requests');
        Route::post('/reservations/requests/store', [ReservationRequestController::class, 'store'])->name('tables.store');
        Route::post('/reservations/requests/update', [ReservationRequestController::class, 'update'])->name('tables.update');
        Route::get('/reservations/requests/delete/{}', [ReservationRequestController::class, 'destroy'])->name('tables.destroy');
        
        Route::get('/reservations', [ReservationController::class, 'index'])->name('tables');
        Route::post('/reservations/store', [TableController::class, 'store'])->name('tables.store');
        Route::post('/reservations/update', [TableController::class, 'update'])->name('tables.update');
        Route::get('/tables/delete/{table}', [TableController::class, 'destroy'])->name('tables.destroy'); */
        
        Route::get('/logout', [StaffAuthController::class, 'destroy'])->name('logout');
    }
);


Route::middleware('notStaff')->prefix('/staff')->name('staff.')->group(function () {
    Route::get('/login', [StaffAuthController::class, 'create'])->name('login');
    Route::post('/authenticate', [StaffAuthController::class, 'authenticate'])->name('authenticate');    
});

Route::prefix('/helper')->name('helper.')->group(function (){
    Route::get('/countries', [HelperController::class, 'countriesSuggests'])->name('countries');
    Route::get('/states', [HelperController::class, 'statesSuggests'])->name('states');
    Route::get('/cities', [HelperController::class, 'citiesSuggests'])->name('cities');
    Route::get('/menus', [MenuController::class, 'suggests'])->name('menus');
    Route::get('/categories', [CategoryController::class, 'suggests'])->name('categories');
});

/* Auth::routes(); */

/* Route::get('/test', function(){
    $item = Item::find(2);
    dd(route('/').$item->images);
    return redirect(route('/').$item->images);
}); */
