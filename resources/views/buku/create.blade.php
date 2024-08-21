@extends('layout.app')
@section('content')
    <div class="min-h-screen bg-gray-100 p-6">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-semibold text-slate-800 mb-4 border-b border-gray-300 pb-2">Tambah Buku</h1>
            <form action="/book" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Judul Buku -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Buku</label>
                        <input type="text" id="judul" name="judul" autocomplete="off" autofocus
                            class="block w-full border border-gray-300 rounded-md shadow-sm bg-gray-50 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('judul') }}">
                        @error('judul')
                            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Kategori Buku -->
                    <div class="mb-4">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori Buku</label>
                        <select id="kategori_id" name="kategori_id"
                            class="block w-full border border-gray-300 rounded-md shadow-sm bg-gray-50 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option selected disabled>Pilih kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Deskripsi Buku -->
                    <div class="mb-4 col-span-2">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Buku</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="block w-full border border-gray-300 rounded-md shadow-sm bg-gray-50 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm resize-none">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Jumlah Buku -->
                    <div class="mb-4 col-span-2">
                        <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Buku</label>
                        <input type="number" id="jumlah" name="jumlah"
                            class="block w-full border border-gray-300 rounded-md shadow-sm bg-gray-50 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Cover Buku -->
                    <div class="mb-4">
                        <label for="cover_buku" class="block text-sm font-medium text-gray-700 mb-1">Cover Buku (png, jpeg,
                            dan
                            jpg)</label>
                        <input type="file" id="cover_buku" name="cover_buku"
                            class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            accept="image/jpeg, image/png, image/jpg">
                        @error('cover_buku')
                            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- file buku --}}
                    <div class="mb-4">
                        <label for="file_buku" class="block text-sm font-medium text-gray-700 mb-1">File Buku (pdf)</label>
                        <input type="file" id="file_buku" name="file_buku"
                            class="block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            accept="application/pdf">
                        @error('file_buku')
                            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-4 mt-6">
                    <button type="submit"
                        class="bg-indigo-600 text-white rounded-lg px-6 py-3 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">Simpan</button>
                    <a href="/"
                        class="bg-gray-600 text-white rounded-lg px-6 py-3 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors duration-300">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
