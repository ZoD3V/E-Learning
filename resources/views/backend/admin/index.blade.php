@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection

@section('javascript')

  <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
      <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


@endsection

@section('content')
<div class="w-full max-h-screen flex flex-col">
     {{-- sidebar --}}
    <div class="min-h-screen lg:flex" x-data="{open: false}">
        <nav
            class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative z-10 w-[250px] bg-white border-r text-white h-screen"
            :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': open === false}"
        >
            <div class="flex justify-center items-center">
                <div class="p-3"><img src="{{asset('assets/images/Logo.png')}}" class="h-9" alt="Logo" /></div>
                <button
                    class="p-2 focus:outline-none lg:hidden flex items-center justify-center"
                    @click="open = false"
                >
                    <div class="text-black text-xl font-bold mt-3"><ion-icon name="chevron-back-outline"></ion-icon></div>
                </button>
            </div>

            <div class="flex flex-col justify-start items-start w-full space-y-4 text-black mt-10 ">
            <div class="flex flex-row items-start justify-start px-6 py-2 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="grid"></ion-icon>
                </div>
            <span class="ml-3 font-light">Dashboard</span>
            </div>

            <span class="text-center px-6 py-2">Menu</span>

            <div x-data='{openDrop:false}' class="w-full">
                <div class="flex flex-row items-center justify-between px-6 py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="flex">
                    <div class="text-blue-600 text-xl">
                        <ion-icon name="people-circle-outline"></ion-icon>
                    </div>
                        <span class="ml-3 font-light text-[15px]">Manajemen Admin</span>
                    </div>
                    <div x-on:click="openDrop = !openDrop"><ion-icon name="chevron-down-outline"></ion-icon></div>
                </div>

                <div class="text-left text-sm w-4/5 mx-auto" x-show="openDrop" @click.outside="openDrop = false">
                    <h1 class="cursor-pointer p-2 hover:bg-blue-200 rounded-md "><a href="{{route('b.manage.role.index')}}">Manajemen Role</a></h1>
                    <h1 class="cursor-pointer p-2 hover:bg-blue-200 rounded-md ">Manajemen Permission</h1>
                    <h1 class="cursor-pointer p-2 hover:bg-blue-200 rounded-md ">Manajemen Users</h1>
                </div>
            </div>

            <div class="flex flex-row items-start justify-start px-6 py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="tablet-landscape"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Guru</span>
            </div>

            <div class="flex flex-row items-start justify-start px-6  py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="school"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Siswa</span>
            </div>


            <div class="flex flex-row items-start justify-start px-6  py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="phone-portrait"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Mapel</span>
            </div>

            <div class="flex flex-row items-start justify-start px-6  py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="book"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Materi</span>
            </div>


            <div class="flex flex-row items-center justify-start px-6  py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="clipboard"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Kelas</span>
            </div>
        </div>
        </nav>
         {{-- end sidebar --}}
        <div class="relative z-0 lg:flex-grow">
             {{-- navbar --}}
            <header class="flex bg-white border-b text-black items-center px-2">
                <button
                    class="p-2 focus:outline-none rounded-md lg:hidden"
                    @click="open = true"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
                <div class="w-full max-w-full">
                    <div class="h-[60px] border-b w-full flex items-center justify-end">
                     <div class="rounded-md px-5 text-black items-center flex">
                            <ion-icon name="create"></ion-icon>
                    <span class="p-2">Edit Profile</span>
                </div>
                <div class="bg-red-500 rounded-md px-5 text-white items-center flex cursor-pointer mr-2">
                    <ion-icon name="log-out"></ion-icon>
                    <span class="p-2">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </span>
            </div>
            </div>
        </div>
            </header>
             {{-- end navbar --}}
            {{-- content --}}
                <div class="flex flex-1 items-center justify-center">
                    Content
                </div>
            {{-- end content --}}
        </div>
</div>

</div>
@endsection



