@extends('layout.app')
@section('content')
    <div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Tambah Kategori Baru</h2>
        <form action="/category" method="POST">
            @csrf
            <!-- Input Nama Kategori -->
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                <input type="text" name="kategori" id="kategori"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Masukkan Nama Kategori" value="{{ old('kategori') }}">
                @error('kategori')
                    <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition ease-in-out duration-150">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
