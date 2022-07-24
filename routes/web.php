<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\Home;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Jurusan;

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
Route::controller(CustomAuthController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('custom-login', 'customLogin')->name('login.custom');
    Route::get('registration', 'registration')->name('register');
    Route::post('custom-registration', 'customRegistration')->name('register.custom');
    Route::get('signout', 'signOut')->name('signout');
});

Route::controller(Home::class)->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('', 'index')->name('beranda');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', function () {
                return view('dashboard.index', [
                    'pages' => 'Dashboard',
                    'name' => Auth::user()->name,
                    'role' => Auth::user()->role,
                    'user' => Auth::user()->email,
                ]);
            })->name('dashboard');
        });
    });
    Route::middleware(['is_admin'])->group(function (){
        Route::controller(PostController::class)->group(function () {
            Route::prefix('post')->group(function () {
                Route::get('/', function () {
                    return view('post.index', [
                        'pages' => 'Post',
                        'posts' => Post::select('*')->latest()->paginate(10),
                        'user'  => Auth::user()->email,
                    ]);
                })->name('post');
                Route::get('add', function () {
                    return view('post.add', [
                        'pages' => 'Add Post',
                        'user' => Auth::user()->email,
                        'category'  => Category::select('*')->get(),
                    ]);
                })->name('post.add');
                Route::post('add/proses', 'store')->name('post.add.proses');
                Route::get('delete/{id}', 'delete')->name('post.delete');
                Route::get('edit/{id}', 'edit')->name('post.edit');
                Route::put('update/{id}', 'update')->name('post.update');
            });
        });
        Route::controller(CategoryController::class)->group(function () {
            Route::prefix('category')->group(function () {
                Route::get('/', function () {
                    return view('category.index', [
                        'pages'     => 'Category',
                        'category'  => Category::select('*')->latest()->paginate(10),
                        'user'      => Auth::user()->email,
                    ]);
                })->name('category');
                Route::get('add', function () {
                    return view('category.add', [
                        'pages'     => 'Add Category',
                        'user'      => Auth::user()->email,
                    ]);
                })->name('category.add');
                Route::post('add/proses', 'store')->name('category.add.proses');
                Route::get('delete/{id}', 'delete')->name('category.delete');
                Route::get('edit/{id}', 'edit')->name('category.edit');
                Route::put('update/{id}', 'update')->name('category.update');
            }); 
        });
        Route::controller(JurusanController::class)->group(function () {
            Route::prefix('jurusan')->group(function () {
                Route::get('/', function () {
                    return view('jurusan.index', [
                        'pages'     => 'Jurusan',
                        'content'   => Jurusan::select('*')->latest()->paginate(10),
                        'user'      => Auth::user()->email,
                    ]);
                })->name('jurusan');
                Route::get('add', function () {
                    return view('jurusan.add', [
                        'pages'     => 'Add Jurusan',
                        'user'      => Auth::user()->email,
                    ]);
                })->name('jurusan.add');
                Route::post('add/proses', 'store')->name('jurusan.add.proses');
                Route::get('delete/{id}', 'delete')->name('jurusan.delete');
                Route::get('edit/{id}', 'edit')->name('jurusan.edit');
                Route::put('update/{id}', 'update')->name('jurusan.update');
            });
        });
    });
    Route::controller(ProfileController::class)->group(function () {
        Route::prefix('profile')->group(function () {
            Route::get('/', 'index', function (User $user) {
            })->name('profile');
        });
    });
});
    

