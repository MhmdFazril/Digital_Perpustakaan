@extends('layout.app')
@section('content')
    <div class="min-h-screen bg-gray-100 p-4">
        <!-- Header dan Filter Kategori -->
        @if (session('success'))
            <div role="alert" class="alert alert-info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="h-6 w-6 shrink-0 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        <h2 class="text-xl sm:text-2xl font-semibold text-slate-800">Daftar/List Buku</h2>
        <div class="flex justify-end items-center gap-4 mb-6">
            <form method="GET" action="/">
                <!-- Filter Kategori -->
                <select id="categoryFilter" name="categoryFilter"
                    class="bg-white border border-gray-300 rounded-lg shadow-sm px-2 py-1 sm:px-4 sm:py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    onchange="this.form.submit()">
                    <option value="all" {{ $selectedCategory == 'all' ? 'selected' : '' }}>Semua Kategori</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}" {{ $selectedCategory == $item->id ? 'selected' : '' }}>
                            {{ $item->kategori }}</option>
                    @endforeach
                </select>
            </form>

            <!-- Tombol Tambah Buku -->
            <a href="/book/create"
                class="inline-flex items-center bg-indigo-600 text-white rounded-lg px-2 py-1 sm:px-4 sm:py-2 shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14m7-7H5"></path>
                </svg>
                <span class="text-sm font-medium">Tambah Buku</span>
            </a>
        </div>

        <!-- Daftar Buku -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-6 justify-center">
            @if (!$buku->isEmpty())
                @foreach ($buku as $item)
                    <!-- Card Buku -->
                    <a href="/book/{{ $item->id }}"
                        class="block bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:-translate-y-2 transition duration-300 border border-gray-200 hover:border-indigo-400">
                        <div class="flex justify-center items-center w-full overflow-hidden h-80 p-2">
                            <img src="{{ asset('storage/' . $item->cover_buku) }}" alt="Judul Buku"
                                class="object-contain max-h-full max-w-full">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-slate-800 mb-1 line-clamp-2">{{ $item->judul }}</h3>
                            <p class="text-sm text-gray-500">Kategori: {{ $item->category->kategori }}</p>
                        </div>
                    </a>
                @endforeach
            @else
                <h2 class="text-2xl font-bold text-black">Tidak ada data yang ditampilkan</h2>
            @endif
        </div>
    </div>
@endsection
