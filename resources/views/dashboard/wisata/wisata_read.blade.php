@extends('layout.app')

@section('content')
<div class="flex">
    @include('layout.sidebar')
    <div class="px-5 w-10/12">
        <div class="my-5">
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
                </div>
            @endif
            @if (Session::has('success'))
                <div id="success"
                    class="w-full px-5 bg-green-500 text-white py-3 rounded items-center">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="mt-7 font-bold text-3xl">Wisata</div>
        <div class="mt-5">
            <a href="{{Route('dashboard.wisata_add')}}" class="border border-black px-10 py-3">+ Add Wisata</a>
        </div>
     
        <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-black dark:text-black">
                <thead class="text-xs text-white uppercase bg-slate-800 dark:bg-grey-300 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Wisata
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lokasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jam Buka
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jam Tutup
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipe Wisata
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wisata as $w)
                    <tr class="bg-white border-b dark:bg-white dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black">
                            {{$w['nama_wisata']}}
                        </th>
                        <td class="px-6 py-4">
                            {{$w['lokasi']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$w['deskripsi']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$w['harga']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$w['jam_buka']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$w['jam_tutup']}}
                        </td>
                        <td class="px-6 py-4">
                            @if($w['tipe_wisata'] == 1)
                            Tempat Wisata
                            @else
                            Event
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <div class="flex space-x-4">
                                <a href="{{route('dashboard.wisata_update', ['id' => $w['id']])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{route('dashboard.wisata_delete', ['id' => $w['id']])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>
</div>
@endsection
