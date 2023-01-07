<div class="w-2/12 text-white bg-slate-800 min-h-screen" id="sidebar">
    <div class="px-5">
        <div class="font-bold text-md mt-4 pb-6 uppercase text-center">
            <div class="">Dashboard</div>
            <div class="">WisataKita</div>
        </div>
        <hr>
        <div class="mt-6">
        </div>
        @auth
            @if (Auth::user()->role == NULL)
                <div class="mt-6">
                    <div class="text-sm uppercase font-semibold text-slate-500">Area User</div>
                    <div class="space-y-3 mt-5">
                        <a href=""
                            class="flex space-x-3 {{ Route::is('pengabdian.create_index') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                            <div class="w-5 text-center">
                                <i class="fas fa-people-carry hover:text-white text-slate-400"></i>
                            </div>
                            <div class="text-sm font-semibold uppercase">history perjalanan</div>
                        </a>
                        <a href='/user/input'
                            class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                            <div class="w-5 text-center">
                                <i class="fas fa-user hover:text-white text-slate-400"></i>
                            </div>
                            <div class="text-sm font-semibold uppercase">Profile</div>
                        </a>
                    </div>
                </div>
                <div class="mt-6">
                    <div class="text-sm uppercase font-semibold text-slate-500">Area Admin</div>
                    <div class="space-y-3 mt-5">
                        <a href="{{route('dashboard.wisata')}}"
                            class="flex space-x-3 {{ Route::is('dashboard.wisata') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                            <div class="w-5 text-center">
                                <i class="fas fa-people-carry hover:text-white text-slate-400"></i>
                            </div>
                            <div class="text-sm font-semibold uppercase">Data Wisata</div>
                        </a>
                        <a href="/admin/input"
                            class="flex space-x-3 items-center hover:bg-slate-500 hover:text-white rounded p-2">
                            <div class="w-5 text-center">
                                <i class="fas fa-user hover:text-white text-slate-400"></i>
                            </div>
                            <div class="text-sm font-semibold uppercase">Data Transaksi</div>
                        </a>
                    </div>
                </div>
            @endif
        @endauth
    </div>
</div>
