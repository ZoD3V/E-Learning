@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection

@section('javascript')
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>

    <script>
        < script src = "../path/to/flowbite/dist/flowbite.js" >
    </script>

    </script>
@endsection

@section('content')
    {{-- Navbar --}}
    <nav class="bg-white border-gray-200 px-2 sm:px-20 py-2.5 rounded dark:bg-gray-900 w-full shadow-md z-20	">
        <div class="container flex flex-wrap items-left justify-between mx-auto">
            <div class=" flex flex-wrap   ">
                <a href="/" class="flex items-center pb-3">
                    <img src="{{ asset('assets/images/Logo.png') }}" class="h-9" alt="Flowbite Logo" />
                </a>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                    <ul
                        class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                aria-current="page">| IPA - Sistem Reproduksi Manusia</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex items-center space-x-10 " onclick="">
                <ul>
                    <li>
                        <p class="text-sm">Muhammad Husna Japa</p>
                    </li>
                    <li>
                        <p class="text-sm">XI-MIPA</p>
                    </li>
                </ul>
                <div class="bg-red-500 rounded-md px-5 text-white items-center flex cursor-pointer ">
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
    </nav>

    <div class="max-h-screen max-w-full">
        <div class="flex flex-col h-[80vh] pt-32 items-start  md:h-[120vh] md:mx-20 mx-5">
            <div class="flex flex-col items-start ">
                <h1 class=" text-2xl  md:text-3xl font-bold text-blue-500 ">Selamat datang {{ Auth::user()->name }}</h1>
                <p class=" text-xl md:text-xl text-blue-500 font-semibold 	py-1">XI-MIPA</p>
                <p class="md:text-sm ">Semoga aktivitas belajarmu menyenangkan.</p>
            </div>

            <div class="flex flex-col items-start pt-5 w-full">
                <h1 class=" text-xl md:text-3xl font-bold pb-2">XI-MIPA - Kimia - Reaksi Redoks </h1>
                <div class="md:bg-gray-700 rounded p-5 bg-gray-700 flex w-full">
                    <div class="flex justify-between w-full items-center ">
                        <div class="flex flex-col">
                            <p class="text-white text-lg md:text-xl">Progress belajar</p>
                            <div class="w-full bg-gray-200 h-3 rounded-3xl my-2 flex flex-row ">
                                <div class="bg-blue-600 h-3 rounded-3xl " style="width: 45%"></div>

                            </div>
                            <p class="text-white text-base">Terakhir belajar 1 menit lalu</p>

                        </div>
                        <button type="button"
                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center ml-2 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a
                                href="{{ route('register') }}">{{ __('Lanjut Belajar') }}</a></button>

                    </div>
                </div>
            </div>

            <div class="h-[100vh] max-w-full flex flex-column justify-center items-center my-20 w-full">
                {{-- <div class="grid grid-cols-4 gap-4 w-full ">
                    @foreach ($test = [1, 2, 3, 4, 5, 6, 7, 8] as $item)
                        <div class=" py-5 sm:py-10 bg-white border-1  drop-shadow-xl rounded flex flex-col items-center">
                            <a href="{{ route('frontend.siswa.detail') }}" class="flex items-center w-20 md:w-40 ">
                                <img src="{{ asset('assets/images/teacher.png') }}" class="" alt="Flowbite Logo" />
                            </a>
                            <p class="text-center text-gray-500">Kimia</p>
                        </div>
                    @endforeach

                </div> --}}
            </div>
        </div>

    </div>

    {{-- {Footer} --}}
    <div class="flex flex-col mt-96 my-20 mx-20 pt-96">
        <span class="h-0.5 w-full bg-gray-400 lg:w-full"></span>
        <p class=" text-sm md:text-lg my-5">© Klassin 2022 - all right reserved</p>
    </div>
@endsection
