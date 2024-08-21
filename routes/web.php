<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function(Request $request){

        $kategori = Category::all();

        $selectedCategory = $request->input('categoryFilter', 'all');

        if(auth()->user()->role == 'admin'){
            if ($selectedCategory == 'all') {
                $query = Book::all();
            } else {
                $query = Book::where('kategori_id', $selectedCategory)->get();
            }
        } else {
            if ($selectedCategory == 'all') {
                $query = Book::where('user_id', auth()->user()->id)->get();
            } else {
                $query = Book::where('user_id', auth()->user()->id)
                            ->where('kategori_id', $selectedCategory)
                            ->get();
            }
        }

        return view('buku.index', [
            'title' => 'Dashboard',
            'kategori' => $kategori,
            'buku' => $query,
            'selectedCategory' => $selectedCategory
        ]);
    });

    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::resource('/book', BookController::class)->except('index');
    Route::resource('/category', CategoryController::class)->except('show');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'login']);
    Route::post('/login', [AuthenticationController::class, 'authenticate']);
    Route::get('/register', [AuthenticationController::class, 'register']);
    Route::post('/register', [AuthenticationController::class, 'regist']);
});
