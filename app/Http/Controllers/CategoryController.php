<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role != 'admin'){
            return redirect('/');
        }

        return view('kategori.index', [
            'title' => 'Kategori',
            'kategori' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->role != 'admin'){
            return redirect('/');
        }

        return view('kategori.create', [
            'title' => 'Tambah kategori',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kategori' => 'required|max:15|unique:categories'
        ]);

        Category::create($validateData);

        return redirect('/category')->with('success', 'Kategori baru ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if(auth()->user()->role != 'admin'){
            return redirect('/');
        }

        return view('kategori.update', [
            'title' => 'Edit kategori',
            'kategori' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validateData = $request->validate([
            'kategori' => 'required|unique:categories'
        ]);

        Category::where('id', $category->id)->update($validateData);

        return redirect('/category')->with('success', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        Book::where('kategori_id', $category->id)->delete();
        return redirect('/category')->with('success', 'kategori berhasil dihapus');
    }
}
