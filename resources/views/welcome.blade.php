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

<?php
$arr = [['Kebun Binatang', '08:00 - 16:00', 'Tambun Utara, Bekasi', '1.png'], ['Kebun Binatang 2', '08:00 - 16:00', 'Tambun Utara, Bekasi', '1.png'], ['Kebun Binatang 3', '08:00 - 16:00', 'Tambun Utara, Bekasi', '1.png'], ['Kebun Binatang 4', '08:00 - 16:00', 'Bogor', '1.png']];
?>

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
    <div class="mt-10">
        <div class="">
            <div class="flex">
                <div class="w-5/12 px-10 py-20 bg-primary-green text-white">
                    <div class="space-y-5 w-5/6">
                        <div class="text-6xl font-bold font-raleway">
                            Buat Liburanmu Lebih Ceria
                        </div>
                        <p class="text-nunito font-semibold text-lg">Banyak tempat wisata yang menunggumu untuk
                            dikunjungi. Ayo booking tempat wisata sekarang!</p>
                        <button class="px-8 py-2 bg-primary-pink text-lg font-semibold text-nunito rounded">Booking
                            Sekarang!</button>
                    </div>
                </div>
                <div class="w-7/12 bg-red-200 bg-[url('/images/1.png')] bg-cover"></div>
            </div>
        </div>
    </div>
    <div class="mt-20 pb-20">
        <div class="text-center">
            <div class="font-raleway font-bold text-4xl">Pilih Destinasimu</div>
            <div class="flex justify-center">
                <div class="w-1/6 text-light">Pilih destinasi terdekatmu, ada berbagai tempat wisata menarik</div>
            </div>
        </div>
        <div class="mt-10">
            <div class="px-40 grid grid-cols-4 gap-10 text-white font-nunito">
                @foreach ($arr as $data)
                    <div
                        class="w-[18rem] h-[25rem] bg-gray-800 rounded-xl relative bg-[url('/images/place/{{ $data[3] }}')] bg-cover">
                        <div class="absolute right-0 py-3 px-5 bg-red-500 rounded-bl-xl rounded-tr-xl">
                            Ramai
                        </div>
                        <div class="px-5 text-lg absolute bottom-0 w-full py-5 rounded-b-xl bg-black bg-opacity-50">
                            <div class="font-bold">{{ $data[0] }}</div>
                            <div>{{ $data[1] }}</div>
                            <div>{{ $data[2] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="py-32">
        <div class="flex h-[33rem]">
            <div class="w-7/12 bg-[url('/images/2.png')] bg-cover"></div>
            <div class="w-5/12 bg-primary-green px-10 py-10 text-white space-y-3">
                <div class="text-raleway font-bold text-3xl">
                    Tentang Kami
                </div>
                <div class="text-xl w-11/12 font-nunito">
                    Kami telah bekerja sama dengan beberapa wisata di provinsi dan kota untuk memberikan pelayanan yang
                    terbaik.
                </div>
                <div class="flex justify-center pt-10">
                    <div class="grid grid-cols-2 gap-16 text-nunito text-lg text-center">
                        <div>
                            <div class="font-semibold text-3xl">170+</div>
                            <div>Wisata</div>
                        </div>
                        <div>
                            <div class="font-semibold text-3xl">17</div>
                            <div>Provinsi</div>
                        </div>
                        <div>
                            <div class="font-semibold text-3xl">52</div>
                            <div>Kota</div>
                        </div>
                        <div>
                            <div class="font-semibold text-3xl">4200+</div>
                            <div>Pengguna</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
