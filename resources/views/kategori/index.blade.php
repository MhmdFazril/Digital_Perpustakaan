@extends('layout.app')
@section('content')
    <div class="min-h-screen bg-gray-100 p-4">
        <div class="container mx-auto">
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
            <div class="flex justify-between mb-7">
                <h2 class="text-2xl font-semibold text-slate-800 mb-4">Daftar Kategori</h2>
                <a href="/category/create"
                    class="inline-flex items-center bg-indigo-600 text-white rounded-lg px-2 py-1 sm:px-4 sm:py-2 shadow-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14m7-7H5"></path>
                    </svg>
                    <span class="text-sm font-medium">Tambah Kategori</span>
                </a>
            </div>

            <!-- Tabel Kategori -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full bg-white">
                    <thead class="bg-indigo-500 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Kategori</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($kategori as $item)
                            <tr class="border-b">
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $item->kategori }}</td>
                                <td class="text-left py-3 px-4 flex items-center gap-4">
                                    <!-- Tombol Edit -->
                                    <a href="/category/{{ $item->id }}/edit"
                                        class="text-indigo-600 hover:text-indigo-900 font-semibold transition-colors duration-200">
                                        Edit
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="/category/{{ $item->id }}" method="POST"
                                        onsubmit="return confirm('Menghapus kategori ini akan menghapus semua buku yang memakai kategori ini')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 font-semibold transition-colors duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
