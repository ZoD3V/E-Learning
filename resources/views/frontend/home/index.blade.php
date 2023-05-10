@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection

@section('javascript')
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    {{-- <script>
        const hamburger = document.getElementById("hamburger");
        const navMenu = document.getElementById("nav-menu");

        hamburger.addEventListener("click", function() {
            hamburger.classList.toggle("hamburger-active");
            navMenu.classList.toggle("hidden");
        });
    </script> --}}
@endsection

@section('content')
    <div>
        {{-- Navbar --}}
        <div class="w-full h-[60px] shadow-md fixed bg-white z-[9999] px-4">
            <div class="container h-full mx-auto px-4 flex items-center justify-between">
                <div class="w-full flex items-center">
                    <img class="w-[100px] cursor-pointer" src="assets/images/Logo.png" alt="" />

                    <ul class="lg:flex hidden">
                        <li class="p-4 mt-2 cursor-pointer text-[15px] font-medium">
                            About
                        </li>
                        <li class="p-4 mt-2 cursor-pointer text-[15px] font-medium">
                            Services
                        </li>
                        <li class="p-4 mt-2 cursor-pointer text-[15px] font-medium">
                            School List
                        </li>
                        <li class="p-4 mt-2 cursor-pointer text-[15px] font-medium">
                            Contact
                        </li>
                    </ul>
                </div>
                <div class="lg:flex gap-3 hidden">
                    <a href="{{ route('login') }}"
                        class="font-medium p-1.5 px-5 text-[15px] cursor-pointer rounded border-2 border-purple-600">Login</a>
                    <a href="{{ route('register') }}"
                        class="font-medium p-1.5 px-5 text-[15px] cursor-pointer rounded text-white bg-purple-600">Signin</a>
                </div>

                {{-- mobile --}}
                <div class="cursor-pointer block lg:hidden">
                    <button type="button" id="hamburger">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                </div>
                <nav class="hidden absolute right-4 bg-white py-5 shadow-lg top-[70px] rounded-lg w-[300px] lg:hidden"
                    id="nav-menu">
                    <ul class="block lg:hidden">
                        <li class="group">
                            <a href="/" class="text-lg font-medium text-dark py-2 mx-8 flex group-hover:text-primary">
                                About
                            </a>
                        </li>
                        <li class="group">
                            <a href="#about" class="text-lg font-medium text-dark py-2 mx-8 flex group-hover:text-primary">
                                Services
                            </a>
                        </li>
                        <li class="group">
                            <a href="/" class="text-lg font-medium text-dark py-2 mx-8 flex group-hover:text-primary">
                                School List
                            </a>
                        </li>
                        <li class="group">
                            <a href="/" class="text-lg font-medium text-dark py-2 mx-8 flex group-hover:text-primary">
                                Contact
                            </a>
                        </li>
                    </ul>
                    <div class="flex gap-3 py-2 mx-8">
                        <a href="{{ route('login') }}"
                            class="font-medium p-1.5 px-5 text-[15px] cursor-pointer rounded border-2 border-purple-600">Login</a>
                        <a href="{{ route('register') }}"
                            class="font-medium p-1.5 px-5 text-[15px] cursor-pointer rounded text-white bg-purple-600">Signin</a>
                    </div>
                </nav>
            </div>
        </div>

        {{-- {/* Hero */} --}}
        <div class="w-full pt-[110px]">
            <div class="flex flex-col h-full items-center container mx-auto px-4">
                <div class="flex md:gap-10 flex-wrap items-center justify-center w-full">
                    <h2 class="font-bold text-purple-500 md:text-3xl lg:max-w-[250px] text-2xl text-center">
                        "Easy learning only in Klassin"
                    </h2>
                    <img class="w-[300px] h-[300px]" src="assets/images/math.png" alt="" />
                </div>
                <p class="text-lg mb-2 text-center">
                    Assessment and direction and exercises that motivate students to
                    master the lesson
                </p>
                <div class="p-3 px-10 cursor-pointer rounded bg-gray-100 mt-5 text-purple-500 shadow-md font-bold">
                    SCHOOL LIST
                </div>
                <div class="flex gap-2 my-7 text-center">
                    <span class="text-purple-500 text-lg">✓</span>
                    <p class="font-bold flex gap-2">
                        Trusted by more than 50 million users worldwide
                    </p>
                </div>
            </div>
        </div>

        {{-- {/* Tentang */} --}}
        <div class="w-full bg-white py-[20px] px-4" id="about">
            <div class="max-w-[1240px] mx-auto grid md:grid-cols-2">
                <div class="flex flex-col justify-center">
                    <h1 class="md:text-3xl sm:text-2xl text-2xl font-bold py-2 text-purple-500 mb-3">
                        About Klassin
                    </h1>
                    <p class="text-base font-medium">
                        It is a long established fact that a reader will be distracted by
                        the readable content of a page when looking at its layout. The point
                        of using Lorem Ipsum is that it has a more-or-less normalf
                        distribution of letters, as opposed to using 'Content here, content
                        here'.
                    </p>
                </div>
                <img class="w-[500px] mx-auto my-4" src="assets/images/about.png" alt="" />
            </div>
        </div>

        {{-- {/* Services */} --}}
        <div class="w-full py-4 pb-12 px-4 bg-blue-600" id="services">
            <h2 class="text-center text-white font-bold text-2xl my-5 md:text-3xl">
                Our Services
            </h2>
            <div class="container mx-auto grid md:grid-cols-3 gap-8 px-4 ">
                <div
                    class="w-full shadow-lg hover:scale-105 duration-300 flex flex-col items-center bg-white p-4 my-4 rounded-lg py-4">
                    <img class="mx-auto" src="assets/images/translate.png" alt="" />
                    <p class="text-lg text-center font-medium max-w-[300px]">
                        We help you reduce your fees and increase you overral revenue
                    </p>
                </div>
                <div
                    class="w-full shadow-lg hover:scale-105 duration-300 flex flex-col items-center bg-white p-4 my-4 rounded-lg py-4">
                    <img class="mx-auto" src="assets/images/draw.png" alt="" />
                    <p class="text-lg text-center font-medium max-w-[300px]">
                        We help you reduce your fees and increase you overral revenue
                    </p>
                </div>
                <div
                    class="w-full shadow-lg hover:scale-105 duration-300 flex flex-col items-center bg-white p-4 my-4 rounded-lg py-4">
                    <img class="mx-auto" src="assets/images/math.png" alt="" />
                    <p class="text-lg text-center font-medium max-w-[300px]">
                        We help you reduce your fees and increase you overral revenue
                    </p>
                </div>
            </div>
        </div>

        {{-- {/* Quotes */} --}}
        <div class="w-full px-4 py-16" id="motivation">
            <div class="container mx-auto px-4 flex flex-col items-center justify-center">
                <h2 class="text-center font-bold text-2xl my-5 md:text-3xl text-purple-500 max-w-[1240px]">
                    "Education is the most powerful weapon you can use to change the
                    world"
                </h2>
                <p class="text-end font-bold text-lg">- Nelson Maleda</p>
            </div>
        </div>

        {{-- {/* Footer */} --}}
        <div class="w-full pt-24 pb-12 bg-slate-800 z-[9999]">
            <div class="container mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full px-4 mb-12 text-slate-300 md:w-1/3">
                        <h3 class="font-bold text-2xl mb-2">Contact Me</h3>
                        <p>klassin@gmail.com</p>
                        <p>Jl, Jakarta Timur No 200</p>
                        <p>Jakarta</p>
                    </div>
                    <div class="w-full px-4 mb-12 text-slate-300 md:w-1/3">
                        <h3 class="font-semibold text-xl text-white mb-5">
                            Halaman Terkait
                        </h3>
                        <ul class="text-slate-300">
                            <li>
                                <a href="/" class="inline-block text-base hover:text-primary mb-3">
                                    <Link to="about" smooth={true} duration={500}>
                                    About
                                    </Link>
                                </a>
                            </li>
                            <li>
                                <a href="/" class="inline-block text-base hover:text-primary mb-3">
                                    <Link to="services" smooth={true} duration={500}>
                                    Services
                                    </Link>
                                </a>
                            </li>
                            <li>
                                <a href="/" class="inline-block text-base hover:text-primary mb-3">
                                    <Link to="contact" smooth={true} duration={500}>
                                    Contact
                                    </Link>
                                </a>
                            </li>
                            <li>
                                <a href="/" class="inline-block text-base hover:text-primary mb-3">
                                    <Link to="school-list" smooth={true} duration={500}>
                                    School List
                                    </Link>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full px-4 mb-12 text-slate-300 md:w-1/3 flex flex-col md:flex-row gap-8">
                        <div>
                            <h3 class="font-bold text-2xl mb-2 md:text-center">200</h3>
                            <p class="md:text-center">Student Registered</p>
                        </div>
                        <div>
                            <h3 class="font-bold text-2xl mb-2 md:text-center">200</h3>
                            <p class="md:text-center">Teacher Registered</p>
                        </div>
                        <div>
                            <h3 class="font-bold text-2xl mb-2 md:text-center">200</h3>
                            <p class="md:text-center">School Registered</p>
                        </div>
                    </div>
                </div>
                <div class="w-full pt-10 border-t-2 border-slate-700">
                    <div class="flex items-center justify-center mb-5">
                        <a href="/" target="_blank"
                            class="w-9 h-9 mr-3 text-white rounded-full flex justify-center items-center border border-slate-300 hover:border-[#14b8a6] hover:bg-[#14b8a6] hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                        <a href="/" target="_blank"
                            class="w-9 h-9 mr-3 text-white rounded-full flex justify-center items-center border border-slate-300 hover:border-[#14b8a6] hover:bg-[#14b8a6] hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a>
                        <a href="/" target="_blank"
                            class="w-9 h-9 mr-3 text-white rounded-full flex justify-center items-center border border-slate-300 hover:border-[#14b8a6] hover:bg-[#14b8a6] hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="/" target="_blank"
                            class="w-9 h-9 mr-3 text-white rounded-full flex justify-center items-center border border-slate-300 hover:border-[#14b8a6] hover:bg-[#14b8a6] hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="/" target="_blank"
                            class="w-9 h-9 mr-3 text-white rounded-full flex justify-center items-center border border-slate-300 hover:border-[#14b8a6] hover:bg-[#14b8a6] hover:text-white">
                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>TikTok</title>
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                            </svg>
                        </a>
                    </div>
                    <p class="font-medium text-xs text-white text-center">
                        Copyright © 2023
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
