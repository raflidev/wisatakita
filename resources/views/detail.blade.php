@extends('layout.app')
@section('content')
    <div class="px-10 pt-10 font-nunito">
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
                        <button onclick="add()"
                            class="rounded-l-lg bg-primary-pink py-2 px-4 text-xl font-bold text-nunito">+</button>
                        <input class="p-2 w-10 text-center font-bold text-lg text-nunito" type="number" value="1"
                            name="" id="jumlah">
                        <button onclick="minus()"
                            class="rounded-r-lg bg-primary-pink py-2 px-4 text-xl font-bold text-nunito">-</button>
                    </div>
                    <button class="rounded bg-primary-pink py-2 px-5 font-bold">Pesan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-20">
        <div class="space-y-2 text-center">
            <div class="font-bold text-3xl font-raleway">Galeri Foto</div>
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
    </style>
@endsection
