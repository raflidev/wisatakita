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
        <div class="mt-7 font-bold text-3xl">Transaksi</div>
     
        <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-black dark:text-black">
                <thead class="text-xs text-white uppercase bg-slate-800 dark:bg-grey-300 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kode Tiket
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Wisata
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Tiket
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Metode Pembayaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Di Pesan Pada
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $w)
                    <tr class="bg-white border-b dark:bg-white dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black">
                            {{$w['kode_tiket']}}
                        </th>
                        <td class="px-6 py-4">
                            {{$w['nama_wisata']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$w['jumlah_tiket']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$w['total_harga']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$w['metode_pembayaran']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$w['tanggal']}}
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>
</div>
@endsection
