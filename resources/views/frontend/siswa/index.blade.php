@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection

@section('javascript')
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
@endsection

@section('content')
    {{-- Navbar --}}
    <nav class="bg-white border-gray-200 px-4 sm:px-20 py-2.5 rounded dark:bg-gray-900 w-full shadow-md z-20 fixed">
        <div class="container flex flex-wrap items-left justify-between mx-auto">

            <img class="w-[100px] cursor-pointer" src="{{ asset('assets/images/Logo.png') }}" alt="" />


            <div class="flex items-center space-x-5 " onclick="">
                <ul class="flex gap-2 items-center">
                    <li>
                        <p class="text-md md:text-lg">{{ Auth::user()->name }}</p>
                    </li>
                    <li>
                        <p class="text-lg">|</p>
                    </li>
                    <li>
                        <p class="text-md md:text-lg font-semibold">{{ Auth::user()->service_kelas_user->name }}</p>
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

    <div class="max-h-screen max-w-full pt-[50px]">
        <div class="flex flex-col h-[30vh] pt-20 items-start  md:h-[120vh] md:mx-20 mx-5">
            <div class="flex flex-col items-start ">
                <h1 class=" text-2xl pb-1 md:text-3xl font-bold text-blue-500 ">Selamat datang {{ Auth::user()->name }}</h1>
                <p class="text-lg pb-2">Semoga aktivitas belajarmu menyenangkan.</p>
            </div>

            <div class="flex flex-col items-start pt-2 w-full">
                <h1 class=" text-xl md:text-3xl font-bold pb-2">{{ Auth::user()->service_kelas_user->name }} - Reaksi Redoks
                </h1>
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

            <div class="my-20 w-full">
                <div class="container mx-auto grid md:grid-cols-3 gap-8">
                    <div
                        class="w-full shadow-lg hover:scale-105 duration-300 flex flex-col items-center bg-white p-4 my-4 rounded-lg py-4">
                        <img class="mx-auto" src="{{ asset('assets/images/translate.png') }}" alt="" />
                        <p class="text-lg text-center font-medium max-w-[300px]">
                            Kimia
                        </p>
                    </div>
                    <div
                        class="w-full shadow-lg hover:scale-105 duration-300 flex flex-col items-center bg-white p-4 my-4 rounded-lg py-4">
                        <img class="mx-auto" src="{{ asset('assets/images/draw.png') }}" alt="" />
                        <p class="text-lg text-center font-medium max-w-[300px]">
                            Fisika
                        </p>
                    </div>
                    <div
                        class="w-full shadow-lg hover:scale-105 duration-300 flex flex-col items-center bg-white p-4 my-4 rounded-lg py-4">
                        <img class="mx-auto" src="{{ asset('assets/images/math.png') }}" alt="" />
                        <p class="text-lg text-center font-medium max-w-[300px]">
                            Matematika
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- {Footer} --}}
        <section class="bg-primary py-12 px-4">
        <div class="container mx-auto">
            <p class="text-white text-center">
                Copyright &copy; Klassin Shop 2022. All rights reserved
            </p>
        </div>
    </section>
@endsection
