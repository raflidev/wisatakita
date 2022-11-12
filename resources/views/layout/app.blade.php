<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <title>WisataKita</title>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-primary-bg">
    <div class="bg-white">
        <div class=" px-10 font-nunito">
            <div class=" flex items-center justify-between py-5">
                <a href='/' class="text-2xl font-bold font-raleway hover:underline">WisataKita</a>
                <div class="space-x-5">
                    <a class="hover:underline {{ Route::is('wisata.home') ? 'underline  font-semibold' : '' }}"
                        href="/">Home</a>
                    <a class="hover:underline {{ Route::is('wisata.rekomendasi') ? 'underline  font-semibold' : '' }}"
                        href="/rekomendasi">Rekomendasi</a>
                    <a class="hover:underline {{ Route::is('wisata.list') ? 'underline  font-semibold' : '' }}"
                        href="/list_wisata">List Wisata</a>
                </div>
                <div class="flex space-x-5 items-center">
                    <div id="search" class="hidden">
                        <input type="text" id="searchInput" onkeyup="search()"
                            class="py-0.5 px-10 rounded-full border border-primary-pink">
                    </div>
                    <div class="bg-primary-pink hover:bg-slate-300 hover:cursor-pointer px-2 py-1 rounded-full hidden"
                        id='searchButton2' onclick="searchButtonGo()">
                        <i class="fas fa-search text-white"></i>
                    </div>
                    <div class="bg-primary-pink hover:bg-slate-300 hover:cursor-pointer px-2 py-1 rounded-full"
                        id='searchButton' onclick="searchButton()">
                        <i class="fas fa-search text-white"></i>
                    </div>
                    <div class="bg-primary-pink rounded-full p-1 hover:bg-red-500 hidden" id='close'
                        onclick="closeButton()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-white hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div>
                        <a href="" class=" font-semibold bg-primary-pink text-white py-2 px-4 rounded-lg">Masuk /
                            Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content');

    <div class="bg-white py-16">
        <div class="flex justify-between px-20">
            <div class="font-nunito space-y-2">
                <a href="/" class="font-bold text-2xl font-raleway">WisataKita</a>
                <div class="w-4/6">Jl. Tirta 8, Sumbermakmur Bontang, Bontang Baru</div>
                <div class="">+62 878253688881</div>
                <div class="flex space-x-4">
                    <div class="px-2 py-1 rounded-full bg-red-700">
                        <i class="fab fa-instagram text-white"></i>
                    </div>
                    <div class="px-2 py-1 bg-blue-800 rounded-full">
                        <i class="fab fa-facebook text-white"></i>
                    </div>
                    <div class="px-2 py-1 rounded-full bg-blue-400">
                        <i class="fab fa-twitter text-white"></i>
                    </div>
                </div>
            </div>
            <div class="flex space-x-16 pr-10">
                <div>
                    <div class="font-bold font-nunito text-lg">Links</div>
                    <div class="space-y-1 font-nunito">
                        <div>
                            <a href="" class="hover:underline">Privacy & Policy</a>
                        </div>
                        <div>
                            <a href="" class="hover:underline">Terms & Conditions</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="font-bold font-nunito text-lg">Produk</div>
                    <div class="space-y-1 font-nunito">
                        <div>
                            <a href="" class="hover:underline">Cari Wisata</a>
                        </div>
                        <div>
                            <a href="" class="hover:underline">Rekomendasi</a>
                        </div>
                        <div>
                            <a href="" class="hover:underline">About</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function searchButton() {
            document.getElementById('search').classList.remove('hidden');
            document.getElementById('close').classList.remove('hidden');
            document.getElementById('searchButton').classList.add('hidden');
        }

        function closeButton() {
            document.getElementById('searchButton').classList.remove('hidden');
            document.getElementById('search').classList.add('hidden');
            document.getElementById('close').classList.add('hidden');
        }

        function search() {
            let search = document.getElementById('searchInput');
            search.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    searchButtonGo()
                }
            });
            if (search.value.length > 0) {
                document.getElementById('close').classList.add('hidden');
                document.getElementById('searchButton2').classList.remove('hidden');
            } else {
                document.getElementById('close').classList.remove('hidden');
                document.getElementById('searchButton2').classList.add('hidden');
            }
        }

        function searchButtonGo() {
            let search = document.getElementById('searchInput').value;
            if (search.length > 0) {
                window.location.href = '/list_wisata/' + search;
            }
        }
    </script>
</body>

</html>
