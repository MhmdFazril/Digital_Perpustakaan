<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create', [
            'title' => 'Tambah Buku',
            'kategori' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:70|unique:books',
            'kategori_id' => 'required',
            'deskripsi' => 'required|max:500',
            'jumlah' => 'required|integer|min:1',
            'cover_buku' => 'required|image|mimes:jpg,png,jpeg,svg|max:1024',
            'file_buku' => 'required|file|mimes:pdf|max:10000'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        $validateData['cover_buku'] = $request->file('cover_buku')->store(str_replace(' ', '-', auth()->user()->name) . '/cover');
        $validateData['file_buku'] = $request->file('file_buku')->store( str_replace(' ', '-', auth()->user()->name) . '/book');
        
        Book::create($validateData);

        return redirect('/')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('buku.detail', [
            'title' => 'Detail Buku',
            'buku' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('buku.update', [
            'title' => 'Edit Buku',
            'buku' => $book,
            'kategori' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'kategori_id' => 'required',
            'deskripsi' => 'required|max:500',
            'jumlah' => 'required|integer|min:1',
            'cover_buku' => 'image|mimes:jpg,png,jpeg,svg|max:1024',
            'file_buku' => 'file|mimes:pdf|max:10000'
        ];

        if($request->judul != $book->judul){
            $rules['judul'] = 'required|unique:books';
        }

        $validateData = $request->validate($rules);
        $validateData['judul'] = $request->judul;

        if($request->file('cover_buku')){
            Storage::delete($book->cover_buku);
            $validateData['cover_buku'] = $request->file('cover_buku')->store(str_replace(' ', '-', auth()->user()->name) . '/cover');
        }

        if($request->file('file_buku')){
            Storage::delete($book->file_buku);
            $validateData['file_buku'] = $request->file('file_buku')->store(str_replace(' ', '-', auth()->user()->name) . '/book');
        }

        Book::where('id', $book->id)->update($validateData);

        return redirect('/')->with('success', 'Buku berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Storage::delete($book->cover_buku);
        Storage::delete($book->file_buku);
        Book::destroy($book->id);
        
        return redirect('/')->with('success', 'buku berhasil dihapus');
    }
}
