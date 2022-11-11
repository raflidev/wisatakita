@extends('layout.app')
@section('content')
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
                @foreach ($data as $data)
                    <a href="{{ route('wisata.detail', ['id' => $data['id']]) }}"
                        style='background-image: url("/images/place/{{ $data['gambar'] }}")'
                        class="w-[18rem] h-[25rem] bg-gray-800 rounded-xl relative bg-cover">
                        <div class="absolute right-0 py-3 px-5 bg-red-500 rounded-bl-xl rounded-tr-xl">
                            Ramai
                        </div>
                        <div class="px-5 text-lg absolute bottom-0 w-full py-5 rounded-b-xl bg-black bg-opacity-50">
                            <div class="font-bold">{{ $data['nama_wisata'] }}</div>
                            <div>{{ $data['jam_buka'] }} - {{ $data['jam_tutup'] }}</div>
                            <div>{{ $data['lokasi'] }}</div>
                        </div>
                    </a>
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
@endsection
