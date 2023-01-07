@extends('layout.app')

@section('content')
<div class="flex">
    @include('layout.sidebar')
    <div class="px-5 w-10/12">
        <div class="mt-7 font-bold text-3xl">Tambah Wisata</div>
        @if (count($errors) > 0)
        <div id="error" class="px-5 bg-red-500 text-white py-3 rounded items-center">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
      @endif
        @if ($errors->first('wrong'))
            <div id="error" class="w-full px-5 bg-red-500 text-white py-3 rounded items-center">
                {{ $errors->first('wrong') }}
                <div class="float-right" onclick="closePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6  hover:rounded-full text-white hover:bg-red-800 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        @endif
        @if (Session::has('success'))
            <div id="success"
                class="w-full px-5 bg-green-500 text-white py-3 rounded -mt-16 items-center">
                {{ Session::get('success') }}
                <div class="float-right" onclick="closePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6  hover:rounded-full text-white hover:bg-green-800 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = "/"
                }, 1000);
            </script>
        @endif
        <form action="{{route('dashboard.wisata_post')}}" method="post" class="mt-5">
            @csrf
            @method('POST')
            <input type="hidden" name="id_admin" value="{{Auth::user()->id}}">
            <div class="flex flex-col w-1/2">
                <div class="mt-2 w-full space-y-2">
                    <div class="">Nama Wisata</div>
                    <input type="text" name="nama_wisata" class="border border-black px-3 py-2 w-full" placeholder="Nama Wisata">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Lokasi</div>
                    <input type="text" name="lokasi" class="border border-black px-3 py-2 w-full" placeholder="Lokasi Wisata">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Jam Operasional</div>
                    <div class="flex items-center space-x-4">
                        <input name="jam_buka" type="text" class="border border-black px-3 py-2 w-full" placeholder="Jam Buka">
                        <div class="text-xl">-</div>
                        <input name="jam_tutup" type="text" class="border border-black px-3 py-2 w-full" placeholder="Jam Tutup">
                    </div>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Harga Tiket</div>
                    <input type="text" name="harga" class="border border-black px-3 py-2 w-full" placeholder="Harga Tiket">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Deskripsi</div>
                    <textarea name="deskripsi" class="border border-black px-3 py-2 w-full" placeholder="Deskripsi Wisata"></textarea>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Max Ticket</div>
                    <input name = "max_tiket" class="border border-black px-3 py-2 w-full" placeholder="Max Ticket">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Tipe Wisata</div>
                    <select name="tipe_wisata" id="" class="border border-black px-3 py-2 w-full">
                        <option value="1">Tempat Wisata</option>
                        <option value="2">Event</option>
                    </select>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Gambar</div>
                    <input name="gambar" type="file" class="border border-black px-3 py-2 w-full">
                </div>
                <button>
                    <div class="border border-black px-3 py-2 mt-5 w-full text-center bg-white hover:bg-slate-800 hover:text-white">Tambah</div>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
