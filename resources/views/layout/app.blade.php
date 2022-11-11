<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <title>Laravel</title>
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
                <div class="text-2xl font-bold font-raleway">WisataKita</div>
                <div class="space-x-5">
                    <a href="">Home</a>
                    <a href="">Rekomendasi</a>
                    <a href="">List Wisata</a>
                </div>
                <div class="flex space-x-5 items-center">
                    <div class="bg-primary-pink px-2 py-1 rounded-full">
                        <i class="fas fa-search text-white"></i>
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
                <div class="font-bold text-2xl font-raleway">WisataKita</div>
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
</body>

</html>
