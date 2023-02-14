@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection

@section('javascript')
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <script>
        < script src = "../path/to/flowbite/dist/flowbite.js" >
    </script>
    </script>
@endsection

@section('content')
    {{-- Navbar --}}
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 fixed w-full shadow-md ">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
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
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div onclick="">
                <button type="button"
                    class="text-black border-2 border-blue-700 hover:bg-blue-800 focus:ring-4 hover:text-white focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a
                        href="{{ route('login') }}">{{ __('Masuk') }}</a></button>
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center ml-2 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a
                        href="{{ route('register') }}">{{ __('Daftar') }}</a></button>

            </div>

        </div>
    </nav>
    <div class="max-h-screen max-w-full">

        {{-- {/* content */} --}}
        <div class="flex flex-col h-[80vh] justify-center items-center md:h-screen">
            <div class="flex flex-row justify-center items-center md:mx-auto mx-20">
                <div class="flex flex-col">
                    <div class="font-bold text-blue-500 text-3xl text-center md:ml-60 md:text-5xl">
                        Jadi “si paling rajin” dengan Klassin
                    </div>

                </div>
                <div class="hidden md:block">
                    <img class="object-contain w-[500px] md:mr-60" src={{ asset('assets/images/education.png') }}
                        alt="..." />
                </div>
            </div>
            <p class="text-center mt-3 mb-5 mx-20">
                Penilaian, pengarahan, dan latihan yang memotivasi siswa menguasai
                pelajaran
            </p>
            <div class="flex flex-col justify-center md:flex md:flex-row w-full md:mx-auto ">

                <div
                    class="bg-slate-400 py-[1.5px] text-white mx-10 md:mx-0 rounded-md font-bold text-sm text-center cursor-pointer shadow-lg px-20">
                    <p class=" text-center">Sekolah</p>
                    <p class="text-center ">Daftar</p>
                </div>
            </div>
            <div class="flex items-center md:mx-auto mx-10 my-2 ">
                <div class="text-blue-500 text-3xl p-2">
                    <ion-icon name="checkmark-outline"></ion-icon>
                </div>
                <p>Dipercaya oleh lebih dari 50 juta pengguna di seluruh dunia</p>
            </div>
        </div>

        {{-- {/* Tentang */} --}}
        <div class="flex flex-row h-[60vh] justify-center items-center bg-white md:h-[50vh] pb-20">
            <div class=" flex-col justify-center items-center mx-20">
                <div class="font-bold text-blue-500 text-4xl mb-10">
                    Tentang Klassin
                </div>
                <p class="mt-10 text-gray-700 ">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                    took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
                    recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="hidden md:block mx-20">
                <img src={{ asset('assets/images/teaching.png') }} class="object-contain w-[3000px] rounded "
                    alt="..." />
            </div>
        </div>

        {{-- {/* Services */} --}}
        <div class=" flex-col h-[160vh] justify-center items-center md:h-[60vh] ">
            <div
                class=" font-bold text-blue-500 text-4xl text-center my-20 bg-blue-500 justify-center items-center md:h-[70vh] ">
                <div class="font-bold text-white text-4xl justify-center mb-16 pt-10">
                    Our Services
                </div>

                <div class="grid justify-center items-center md:grid-cols-3 gap-8 m-5 max-w-5xl m-auto ">

                    <div class="max-w-sm mb-5 rounded overflow-hidden shadow-lg bg-white md:max-w-sm h-[45vh] ">
                        <img src={{ asset('assets/images/math.png') }} class="object-contain w-full h-48 sm:h-56"
                            alt="..." />
                        <div class="px-6 py-4">
                            <p class="text-gray-700 text-base mx-5">
                                We help you reduce your fees and increase your overall revenue </p>
                        </div>
                    </div>

                    <div
                        class="max-w-sm mb-5 rounded overflow-hidden shadow-lg bg-white md:max-w-sm h-[45vh] md:justify-center">
                        <img src={{ asset('assets/images/math.png') }} class="object-contain w-full h-48 sm:h-56"
                            alt="..." />
                        <div class="px-6 py-4">
                            <p class="text-gray-700 text-base mx-5">
                                We help you reduce your fees and increase your overall revenue </p>
                        </div>
                    </div>

                    <div class="max-w-sm mb-5 rounded overflow-hidden shadow-lg bg-white md:max-w-sm h-[45vh]">
                        <img src={{ asset('assets/images/math.png') }} class="object-contain w-full h-48 sm:h-56"
                            alt="..." />
                        <div class="px-6 py-4">
                            <p class="text-gray-700 text-base mx-5">
                                We help you reduce your fees and increase your overall revenue </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- {/* Quotes */} --}}
        <div class="flex flex-col h-[70vh] justify-center mx-20 ">
            <div class="font-bold text-blue-500 text-3xl text-center md:text-5xl">
                “Pendidikan adalah senjata paling ampuh yang dapat Anda gunakan untuk mengubah dunia”
            </div>
            <p class="text-xs ml-4 my-2 pt-5 md:text-end md:ml-0 md:my-0 ">
                - Leonardo da Vinci
            </p>
        </div>

        {{-- {/* Footer */} --}}
        <div class="flex flex-col h-[50vh] justify-items-end bg-slate-600 md:h-[55vh]">
            <div class="font-bold text-blue-500 text-3xl mx-10 md:text-4xl text-start md:ml-20 my-10">
                Hubungi Kami
            </div>

            <div class="flex mx-10  md:mx-20 my-5">
                <div class="text-white text-3xl pr-3">
                    <ion-icon name="mail-outline"></ion-icon>
                </div>
                <p class="text-white">klassin@gmail.com</p>
            </div>

            <div class="flex  mx-10  md:mx-20 ">
                <div class="text-white text-3xl pr-3">
                    <ion-icon name="call-outline"></ion-icon>
                </div>
                <p class="text-white">082134567890</p>
            </div>

            <div class="flex flex-row items-center justify-between mx-2 my-20 md:mx-20">

                <span>
                    <img src={{ asset('assets/images/Logo.png') }} class="object-cover w-[100px]" alt="" />
                </span>

                <p class="text-white">© Klassin {{ date('Y') }} - All Rights Reserved</p>

                <div class="flex flex-row ">
                    <div class="text-white text-3xl pr-3">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </div>

                    <div class="text-white text-3xl pr-3">
                        <ion-icon name="logo-whatsapp"></ion-icon>
                    </div>

                    <div class="text-white text-3xl pr-3">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </div>

                    <div class="text-white text-3xl pr-3">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
