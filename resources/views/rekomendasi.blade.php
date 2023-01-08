@extends('layout.app')

@section('navbar')
    @include('layout.navbar')
@endsection

@section('content')
    <div class="bg-primary-bg pb-10">
        <div class="flex justify-center pt-32">
            <div class="text-center">
                <div class="font-bold font-raleway text-4xl">Rekomendasi Wisata</div>
                <div class="font-nunito text-lg flex justify-center">
                    <div class="w-4/6">
                        Pilih destinasi terdekatmu, ada berbagai tempat wisata menarik
                    </div>
                </div>
            </div>
        </div>
        <div class="px-20 pb-20">
            <div class="float-right">
                <select name="" id="" class="px-5 py-2 border border-black">
                    <option value="">Rating Tertinggi</option>
                    <option value="">Tempat Termahal</option>
                    <option value="">Rating Terendah</option>
                    <option value="">Tempat Termurah</option>
                </select>
            </div>
        </div>

        <div class="mt-10">
            <div class="px-40 grid grid-cols-4 gap-10 text-white font-nunito">
                @foreach ($data as $data)
                    <a href="{{ route('wisata.detail', ['id' => $data['id']]) }}"
                        style='background-image: url("/storage/{{ $data['gambar'] }}")'
                        class="w-[18rem] h-[25rem] bg-gray-800 bg-center rounded-xl relative bg-cover">
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
@endsection

@section('footer')
    @include('layout.footer')
@endsection
