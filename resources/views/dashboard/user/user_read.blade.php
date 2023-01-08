@extends('layout.app')

@section('content')
<div class="flex">
    @include('layout.sidebar')
    <div class="px-5 w-10/12">
        <div class="my-4">
            @if (count($errors) > 0)
            <div id="error" class="px-5 bg-red-500 text-white py-3 rounded items-center">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif
            @if (Session::has('success'))
                <div id="success"
                    class="w-full px-5 bg-green-500 text-white py-3 rounded items-center">
                    {{ Session::get('success') }}
                    <div class="float-right" onclick="closePopup()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6  hover:rounded-full text-white hover:bg-green-800 hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
            @endif
        </div>
        <div class="mt-7 font-bold text-3xl">Edit Profile</div>
        <form action="{{route('dashboard.user_put', Auth::user()->id)}}" method="post" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col w-1/2">
                <div class="mt-2 w-full space-y-2">
                    <div class="">Nama Depan</div>
                    <input type="text" value="{{old('nama_depan', Auth::user()->nama_depan)}}" name="nama_depan" class="border border-black px-3 py-2 w-full" placeholder="Nama Depan">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Nama Belakang</div>
                    <input type="text" value="{{old('nama_belakang', Auth::user()->nama_belakang)}}" name="nama_belakang" class="border border-black px-3 py-2 w-full" placeholder="Nama Belakang">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Username</div>
                    <input type="text" value="{{old('username', Auth::user()->username)}}" name="username" class="border border-black px-3 py-2 w-full" placeholder="Username">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Nomor Telepon</div>
                    <input type="text" value="{{old('notelp', Auth::user()->notelp)}}" name="notelp" class="border border-black px-3 py-2 w-full" placeholder="Nomor Telepon">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Kota</div>
                    <input type="text" value="{{old('kota', Auth::user()->kota)}}" name="kota" class="border border-black px-3 py-2 w-full" placeholder="Kota">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Email</div>
                    <input type="email" value="{{old('email', Auth::user()->email)}}" name="email" class="border border-black px-3 py-2 w-full" placeholder="Email">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Confirm Password Anda</div>
                    <input type="password"  name="password" class="border border-black px-3 py-2 w-full" placeholder="Confirm Password Anda">
                </div>
                <button type="submit">
                    <div class="border border-black px-3 py-2 mt-5 w-full text-center bg-white hover:bg-slate-800 hover:text-white">Edit</div>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
