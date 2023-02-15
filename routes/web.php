<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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


    Route::get('/', function () {
        return view('welcome');
    });

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'auth']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'regis']);


Route::get('profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('dashboard', [AdminController::class, 'index'])->middleware(['auth', 'only_admin']);

Route::middleware('auth')->group(function(){
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');
    Route::get('dashboard', [AdminController::class, 'index'])->middleware( 'only_admin');
    Route::get('users', [AdminController::class, 'users'])->middleware( 'only_admin');
    Route::get('users-registered', [AdminController::class, 'usersRegistered'])->middleware( 'only_admin');
    Route::get('users-detail/{slug}', [AdminController::class, 'usersDetail'])->middleware( 'only_admin');
    Route::get('users-approve/{slug}', [AdminController::class, 'usersApprove'])->middleware( 'only_admin');
    Route::get('users-ben/{slug}', [AdminController::class, 'usersBan'])->middleware( 'only_admin');
    Route::get('users-benned', [AdminController::class, 'usersBanned'])->middleware( 'only_admin');
    Route::get('users-restore/{slug}', [AdminController::class, 'usersRestore'])->middleware( 'only_admin');
    Route::get('category', [AdminController::class, 'category'])->middleware( 'only_admin');
    Route::get('category-add', [AdminController::class, 'categoriesAdd'])->middleware( 'only_admin');
    Route::post('category-add', [AdminController::class, 'categoryStore'])->middleware( 'only_admin');
    Route::get('category-edit/{slug}', [AdminController::class, 'categoryEdit'])->middleware( 'only_admin');
    Route::put('category-edit/{slug}', [AdminController::class, 'categoryUpdate'])->middleware( 'only_admin');
    Route::get('books', [AdminController::class, 'books'])->middleware( 'only_admin');
    Route::get('book-add', [AdminController::class,'BooksAdd'])->middleware( 'only_admin');
    Route::post('book-add', [AdminController::class,'BooksStore'])->middleware( 'only_admin');
    Route::get('books-edit/{slug}', [AdminController::class, 'booksEdit'])->middleware( 'only_admin');
    Route::put('books-edit/{slug}', [AdminController::class, 'booksUpdate'])->middleware( 'only_admin');
    Route::get('books-delete/{slug}', [AdminController::class, 'booksDestroy'])->middleware( 'only_admin');
    Route::get('rent_logs', [AdminController::class, 'rent_logs'])->middleware( 'only_admin');
    Route::get('logout', [AuthController::class,'logout']);
});


