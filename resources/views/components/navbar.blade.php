<header class="bg-gradient-to-r from-sky-600 to-indigo-600 text-white shadow-md flex items-center justify-between p-4">
    <div class="flex items-center">
        <a href="/">
            <div class="text-2xl font-extrabold text-white ml-4 tracking-wider">Pustakawan</div>
        </a>
    </div>
    <div class="flex items-center">
        <!-- User Profile -->
        <div class="ml-4 relative">
            <button class="flex gap-2 items-center focus:outline-none" id="profile-dropdown">
                <div class="text-right hidden sm:block">
                    <p class="text-sm text-gray-200 -mb-1">
                        {{ collect(explode(' ', Auth()->user()->name))->take(2)->implode(' ') }}</p>
                    <p class="text-sm text-gray-300 italic">{{ Auth()->user()->role }} perpustakaan</p>
                </div>
                <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-white">
                    <img class="w-full h-full object-cover" src="{{ asset('/img/user.jpg') }}" alt="User Profile">
                </div>
                <svg id="dropdown-icon" class="fill-current text-gray-200" width="12" height="8"
                    viewBox="0 0 12 8" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z"
                        fill="currentColor" />
                </svg>
            </button>
            <div id="profile-dropdown-menu"
                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-20">
                @if (auth()->user()->role == 'admin')
                    <a href="/category"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="rgba(0,0,0,1)" viewBox="0 0 24 24"
                                width="18">
                                <path d="M4 4H10V10H4V4ZM14 4H20V10H14V4ZM4 14H10V20H4V14ZM14 14H20V20H14V14Z"></path>
                            </svg>
                            <p>Daftar Kategori</p>
                        </div>
                    </a>
                @endif
                <a href="/logout"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                    <div class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(0,0,0,1)" width="18">
                            <path
                                d="M4 18H6V20H18V4H6V6H4V3C4 2.44772 4.44772 2 5 2H19C19.5523 2 20 2.44772 20 3V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V18ZM6 11H13V13H6V16L1 12L6 8V11Z">
                            </path>
                        </svg>
                        <p>Logout</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>
