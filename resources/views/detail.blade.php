@extends('layout.app')
@section('content')
    <div class="px-10 pt-10 font-nunito">
        <div id="popupBayar" class="hidden">
            <div
                class="w-[70rem] h-[30rem] bg-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-10 rounded-lg">
                <div class="float-right" onclick="closePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-8 h-8 hover:bg-red-500 hover:rounded-full hover:text-white text-black hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <div class="flex h-full divide-x">
                    <div class="w-1/2">
                        <div class="font-nunito space-y-4">
                            <div class="font-semibold text-xl">Pesan Tiket</div>
                            <div>
                                <div class="font-bold text-2xl">
                                    {{ $data->nama_wisata }}
                                </div>
                                <div class="text-xl">{{ $data->lokasi }}</div>
                            </div>
                            <div class="flex">
                                <div class="w-1/2">
                                    <div class="text-xl">Jumlah</div>
                                    <div class="text-xl font-bold" id="jumlahTiket"></div>
                                </div>
                                <div class="w-1/2">
                                    <div class="text-xl">Harga Tiket Persatuan</div>
                                    <div class="text-xl font-bold">Rp. {{ $data->harga }}</div>
                                </div>
                            </div>
                            <div>
                                <div class="text-xl">Total Pembayaran</div>
                                <div class="text-xl font-bold" id="total"></div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 font-nunito px-5">
                        <div class="text-xl font-bold">Pembayaran via</div>
                        <div class="grid grid-cols-4 gap-4 pt-10">
                            <div>
                                <input class="hidden" id="radio_1" type="radio" name="radio" checked>
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer rounded"
                                    for="radio_1">
                                    <div class="h-[4rem] flex items-center">
                                        <img src="/images/bank/bca.png" alt="" srcset="">
                                    </div>
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="radio_2" type="radio" name="radio">
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer rounded"
                                    for="radio_2">
                                    <div class="h-[4rem] flex items-center">
                                        <img src="/images/bank/bni.png" alt="" srcset="">
                                    </div>
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="radio_3" type="radio" name="radio">
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer rounded"
                                    for="radio_3">
                                    <div class="h-[4rem] flex items-center">
                                        <img src="/images/bank/bri.png" alt="" srcset="">
                                    </div>
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="radio_4" type="radio" name="radio">
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer rounded"
                                    for="radio_4">
                                    <div class="h-[4rem] flex items-center">
                                        <img src="/images/bank/dana.png" alt="" srcset="">
                                    </div>
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="radio_5" type="radio" name="radio">
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer rounded"
                                    for="radio_5">
                                    <div class="h-[4rem] flex items-center">
                                        <img src="/images/bank/gopay.png" alt="" srcset="">
                                    </div>
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="radio_6" type="radio" name="radio">
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer rounded"
                                    for="radio_6">
                                    <div class="h-[4rem] flex items-center">
                                        <img src="/images/bank/linkaja.png" alt="" srcset="">
                                    </div>
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="radio_7" type="radio" name="radio">
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer rounded"
                                    for="radio_7">
                                    <div class="h-[4rem] flex items-center">
                                        <img src="/images/bank/mandiri.png" alt="" srcset="">
                                    </div>
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="radio_8" type="radio" name="radio">
                                <label class="flex flex-col p-4 border-2 border-gray-400 cursor-pointer rounded"
                                    for="radio_8">
                                    <div class="h-[4rem] flex items-center">
                                        <img src="/images/bank/shopeepay.png" alt="" srcset="">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="mt-10">
                            <button
                                class="rounded-lg px-8 py-2 bg-orange-400 hover:bg-orange-800 font-bold text-lg text-white">Lakukan
                                Pembayaran</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="w-1/2">
                <div class="w-[40rem] h-[20rem] rounded bg-cover bg-center float-right"
                    style="background-image: url('/images/place/{{ $data->gambar }}')">
                </div>
            </div>
            <div class="w-1/2 px-10">
                <div class="space-y-1">
                    <div class="font-bold text-3xl">{{ $data->nama_wisata }}</div>
                    <div class="font-semibold text-lg">{{ $data->jam_buka }} - {{ $data->jam_tutup }}</div>
                    <div class="font-semibold text-lg">{{ $data->lokasi }}</div>
                    <div class="pt-3">{{ $data->deskripsi }}</div>
                </div>
                <div class="pt-10 flex space-x-5">
                    <div class="flex">
                        <button onclick="minus()"
                            class="rounded-l-lg bg-primary-pink py-2 px-4 text-xl font-bold text-nunito">-</button>
                        <input class="p-2 w-10 text-center font-bold text-lg text-nunito" type="number" value="1"
                            name="" id="jumlah">
                        <button onclick="add()"
                            class="rounded-r-lg bg-primary-pink py-2 px-4 text-xl font-bold text-nunito">+</button>
                    </div>
                    <button class="rounded bg-primary-pink py-2 px-5 font-bold" onclick="bayar()">Pesan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-20">
        <div class="space-y-2 text-center">
            <div class="font-bold text-2xl font-raleway">Galeri Foto</div>
            <div class="font-semibold font-nunito">Kumpulan foto wisata yang akan anda datangi</div>
        </div>
        <div class="flex justify-center pt-10">
            <div class="grid grid-cols-2 gap-5">
                @for ($i = 0; $i < 4; $i++)
                    <div class="w-[40rem] h-[20rem] rounded bg-cover bg-center float-right"
                        style="background-image: url('/images/place/{{ $data->gambar }}')">
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div>
        <div>
            <h1 class='text-center uppercase text-3xl font-bold py-8'>Lokasi</h1>
            <iframe class='w-5/6 mx-auto h-96' loading="lazy" title='maps'
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCBsWcQJiEmoNEY3XJZCTEfdxU-jkfyn4M
              &q={{ $data->nama_wisata }}">
            </iframe>
        </div>
    </div>

    <script>
        function add() {
            var jumlah = document.getElementById('jumlah').value;
            jumlah++;
            document.getElementById('jumlah').value = jumlah;
        }

        function minus() {
            var jumlah = document.getElementById('jumlah').value;
            if (jumlah > 0) {
                jumlah--;
                document.getElementById('jumlah').value = jumlah;
            }

        }

        function bayar() {
            document.getElementById('popupBayar').classList.remove('hidden');
            var jumlah = document.getElementById('jumlah').value;
            var harga = {{ $data->harga }};
            var total = jumlah * harga;
            document.getElementById('total').innerHTML = "Rp. " + total;
            document.getElementById('jumlahTiket').innerHTML = jumlah;
        }

        function closePopup() {
            document.getElementById('popupBayar').classList.add('hidden');
        }
    </script>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input:checked+label {
            border-color: black;
        }
    </style>
@endsection
