@extends('layout.app')

@section('navbar')
    @include('layout.navbar')
@endsection

@section('content')
    <div class="bg-primary-bg">
        <div class="flex h-screen w-full">
            <div class="m-auto w-9/12">
                <div id="popupMap" class="hidden">
                    <div
                        class="w-[70rem] h-[30rem] border border-black bg-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-10 rounded-lg">
                        <div class="float-right" onclick="closePopup()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="w-8 h-8 hover:bg-red-500 hover:rounded-full hover:text-white text-black hover:cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <div class="w-full">
                            <h1 class='text-center uppercase text-3xl font-bold pb-5'>Lokasi</h1>
                            <iframe class='w-full h-80' loading="lazy" title='maps'
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCBsWcQJiEmoNEY3XJZCTEfdxU-jkfyn4M
          &q={{ $data->nama_wisata }}">
                            </iframe>
                        </div>
                    </div>
                </div>


                <div class="flex justify-center items-center">
                    <div class="w-full bg-white p-8 py-[5rem] rounded-xl items-center">
                        <div class="flex">
                            <div class="w-1/2">
                                <div class="flex h-full">
                                    <div class="m-auto">
                                        {!! QrCode::size(340)->generate($data->kode_tiket) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/2 divide-y divide-black space-y-2">
                                <div class="font-nunito space-y-3">
                                    <div class="text-3xl font-semibold">
                                        {{ $data->nama_wisata }}
                                    </div>
                                    <div class="font-semibold">
                                        {{ $data->jam_buka }} - {{ $data->jam_tutup }} | <span class="text-red-500">Tiket
                                            hanya bisa digunakan
                                            hari ini</span>
                                    </div>
                                    <div class="font-semibold">
                                        Banyak Tiket : {{ $data->jumlah_tiket }}
                                    </div>
                                    <div class="font-semibold">
                                        Kode tiket : {{ $data->kode_tiket }}
                                    </div>
                                    <button onclick="openPopup()"
                                        class="bg-green-700 py-2 px-5 rounded font-semibold text-white hover:bg-green-500 hover:text-black">Buka
                                        Map</button>
                                </div>
                                <div class="pt-5">
                                    <div>
                                        Cara penggunaan tiket
                                    </div>
                                    <ul class="list-decimal pl-4">
                                        <li>Kunjungi lokasi wisata pilihan anda</li>
                                        <li>Pindai gambar QR Code pada gate masuk wisata</li>
                                        <li>Jika tidak bisa memindai gambar QR Code pada gate, silakan ke loket agar dibantu
                                            petugas untuk masuk gate</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function closePopup() {
            document.getElementById('popupMap').classList.add('hidden');
        }

        function openPopup() {
            document.getElementById('popupMap').classList.remove('hidden');
        }

        function loading() {
            document.getElementById('loading').classList.remove('hidden');
            document.getElementById('masuk').classList.add('hidden');
        }
    </script>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
