@extends('layout.app')

@section('content')
    <div>
        <div class="flex justify-center pt-32">
            <div class="text-center w-full">
                <div class="font-bold font-raleway text-4xl w-full">List Wisata</div>
                <div class="font-nunito text-lg flex justify-center mt-6 space-x-4">
                    <input id="searchInput2" onkeyup="searchList()" type="text"
                        class="flex py-1 px-10 w-5/12 rounded-lg border border-black font-nunito"
                        placeholder="Cari tempat wisata mu..." value="{{ $wisata }}">
                    <button onclick="searchButtonGoList()" class="py-1 px-6 bg-primary-pink text-white rounded-lg"><i
                            class="fas fa-search text-white"></i>
                        Search</button>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <div class="px-40 grid grid-cols-4 gap-10 text-white font-nunito">
                @foreach ($data as $data)
                    <a href="{{ route('wisata.detail', ['id' => $data->id]) }}"
                        style='background-image: url("/images/place/{{ $data->gambar }}")'
                        class="w-[18rem] h-[25rem] bg-gray-800 rounded-xl relative bg-cover">
                        <div class="absolute right-0 py-3 px-5 bg-red-500 rounded-bl-xl rounded-tr-xl">
                            Ramai
                        </div>
                        <div class="px-5 text-lg absolute bottom-0 w-full py-5 rounded-b-xl bg-black bg-opacity-50">
                            <div class="font-bold">{{ $data->nama_wisata }}</div>
                            <div>{{ $data->jam_buka }} - {{ $data->jam_tutup }}</div>
                            <div>{{ $data->lokasi }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function searchList() {
            let search = document.getElementById('searchInput2');
            console.log(search.value);
            search.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    searchButtonGoList()
                }
            });
        }

        function searchButtonGoList() {
            let search = document.getElementById('searchInput2').value;
            if (search.length > 0) {
                window.location.href = '/list_wisata/' + search;
            }
        }
    </script>
@endsection
