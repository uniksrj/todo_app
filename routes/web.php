<?php

use App\Http\Controllers\admincontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adduser;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\Todo_list;
use App\Http\Controllers\Authpage;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/home/{name}','dashboard.home');
// Route::view('/home/{name}','dashboard.home');
// Route::view('/about/{name}','dashboard.about');
// Route::get('admin/{name}',[admincontroller::class,'adminpanel']);
// Route::get('user',[admincontroller::class,'userpanel']);


// Route::view('userForm','form.adduser');
// Route::post('adduser',[Adduser::class,'adduser']);

// Route::view("home","home");
// Route::controller(homecontroller::class)->group(function(){
//     Route::get("/add","add");
//     Route::get("/view","view");
// });

Route::get('/', [Todo_list::class,'index'])->name('index');
Route::get('/tasks/create', [Todo_list::class, 'create'])->name('create');
Route::post('/tasks', [Todo_list::class, 'store'])->name('store');
Route::get('/tasks/{task}', [Todo_list::class, 'show'])->name('edit');
Route::put('/tasks/{task}', [Todo_list::class, 'update'])->name('update');
Route::delete('/tasks/{task}', [Todo_list::class, 'destroy'])->name('destroy');
Route::put('/tasks/{task}/complete', [Todo_list::class, 'complete'])->name('complete');
Route::get('/tasks/category/{category}', [Todo_list::class, 'tasksByCategory']);

// auth page
Route::get('/login', [Authpage::class, 'loginView'])->name('login');
Route::post('/login', [Authpage::class, 'login'])->name('login');

Route::post('/logout', [Authpage::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/signup', [Authpage::class, 'signup'])->name('signup');
Route::post('/register', [Authpage::class, 'formsubmit'])->name('register');

