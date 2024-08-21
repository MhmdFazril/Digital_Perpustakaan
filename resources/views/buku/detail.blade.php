@extends('layout.app')
@section('content')
    <div class="min-h-screen bg-gray-100 p-6">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <div class="flex flex-col md:flex-row">
                <!-- Cover Buku -->
                <div class="w-full md:w-1/3 flex justify-center items-center mb-4 md:mb-0">
                    <img src="{{ asset('storage/' . $buku['cover_buku']) }}" alt="Cover Buku"
                        class="w-full h-auto object-cover rounded-lg border border-gray-200 shadow-md">
                </div>
                <!-- Detail Buku -->
                <div class="w-full md:w-2/3 md:pl-6">
                    <h1 class="text-2xl font-semibold text-slate-800 mb-2">{{ $buku['judul'] }}</h1>
                    <p class="text-lg text-gray-600 mb-4">Kategori : <span
                            class="font-semibold">{{ $buku->category->kategori }}</span></p>
                    <p class="text-gray-700 mb-4"><span class="font-semibold">Deskripsi : </span>{{ $buku['deskripsi'] }}
                    </p>
                    @if (auth()->user()->role == 'admin')
                        <p>pengguna : {{ $buku->user->name }}</p>
                    @endif
                    <p class="text-gray-700 mb-4"><span class="font-semibold">Jumlah : </span> {{ $buku['jumlah'] }}</p>
                    <div class="flex gap-4 mt-4">
                        <a href="/book/{{ $buku['id'] }}/edit"
                            class="inline-block bg-indigo-500 text-white rounded-lg px-4 py-2 text-center hover:bg-indigo-600 transition-colors duration-300">Edit</a>
                        <button
                            class="inline-block bg-indigo-500 text-white rounded-lg px-4 py-2 text-center hover:bg-indigo-600 transition-colors duration-300"
                            onclick="my_modal_5.showModal()">show
                            pdf</button>
                        <form action="/book/{{ $buku['id'] }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                            <input type="text" name="delete_id" class="hidden">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block bg-red-500 text-white rounded-lg px-4 py-2 text-center hover:bg-red-600 transition-colors duration-300">Hapus</button>
                        </form>
                    </div>
                    <a href="/"
                        class="inline-block mt-4 bg-gray-500 text-white rounded-lg px-4 py-2 text-center hover:bg-gray-600 transition-colors duration-300">Kembali
                        ke Daftar Buku</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Open the modal using ID.showModal() method -->
    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle p-2">
        <div class="modal-box">
            <iframe class="w-full h-72" src="{{ asset('storage/' . $buku->file_buku) }}" frameborder="0"></iframe>
            <div class="modal-action">
                <a href="{{ asset('storage/' . $buku->file_buku) }}" class="btn btn-error text-gray-100"
                    download="{{ $buku->judul }}">
                    <button>Download</button>
                </a>
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
@endsection
