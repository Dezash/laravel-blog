<?php

use App\Http\Livewire\BlogAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Blogs;
use App\Http\Livewire\PostBlog;
use App\Http\Livewire\EditBlog;
use App\Http\Livewire\BlogQueue;
use App\Http\Livewire\UserList;
use App\Http\Livewire\Post;

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

Route::get('/', Blogs::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


Route::get('blog/admin', BlogAdmin::class)->name('blogadmin')->middleware('auth');
Route::get('blog', Blogs::class)->name('blog');
Route::get('blog/post', PostBlog::class)->name('postblog')->middleware('auth');
Route::get('blog/edit/{id}', EditBlog::class)->name('editblog')->middleware('auth');
Route::get('blog/{id}', Post::class)->name('post')->middleware('auth');
Route::get('blog/queue', BlogQueue::class)->name('queue')->middleware('auth');
//Route::post('blog', CreateBlog::class);

Route::get('/userlist', UserList::class)->name('userlist')->middleware('auth');