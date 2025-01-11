<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\News;
use App\Models\Comment;

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');

Route::get('/comments/{id}', function($id){
    $ns = News::with('comments.user')->find($id);
    $cs = $ns->comments;
    return view('comment', compact('ns', 'cs', 'id'));
});

Route::post('/storeComment', [NewsController::class, 'storeComment'])->name('storeComment');

Route::post('/news', [NewsController::class, 'store'])->name('news.store');

Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/delete/{id}', function($id){
    $user = auth()->user();
    if(!$user->hasRole('admin')){
        return redirect('/');    
    }
    DB::table('news')->where('id', $id)->delete();
    return redirect('/');
});

Route::get('/manage', function(){
    $user = auth()->user();
    if(!$user->hasRole('admin')){
        return redirect('/');
    }
    $news = DB::table('news')->get();
    return view('manage', compact('news'));
});

Route::get('/mine', function(){
    $user = auth()->user();
    $news = DB::table('news')->where('user_id', $user->id)->get();
    return view("mine", compact('news'));
});

Route::get('/delete/{id}', function($id){
    DB::table('news')->where('id', $id)->delete();
    return redirect('/mine');
});

Route::get('/edit/{id}', function($id){
    $n = DB::table('news')->where('id', $id)->first();
    return view("edit", compact('n'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
