@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection

@section('javascript')
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        < script src = "../path/to/flowbite/dist/flowbite.js" >
    </script>
    
    </script>
@endsection

@section('content')
    {{-- Navbar --}}

    <nav class="bg-white border-gray-200 px-2 sm:px-36 py-2.5 rounded dark:bg-gray-900 w-full shadow-md z-20	">
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
                                aria-current="page">|   IPA - Sistem Reproduksi Manusia</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex items-center space-x-2" onclick="">
                <ul>
                    <li><p class="text-sm">Muhammad Husna Japa</p></li>
                    <li><p class="text-sm">XI-MIPA</p></li>
                </ul>
            </div>
        </div>
    </nav>

   {{-- Main --}}

    <div class=" flex min-h-screen max-w-full justify-between">
        <div class="flex  flex-1 flex-col h-[80vh] pt-10 items-start  md:h-[120vh] md:mx-20 mx-5">
                <h1 class=" text-2xl  md:text-3xl font-bold text-blue-500 ">Apa Itu Atom</h1>
                <br>
                <p class="md:text-sm">Dengan menerapkan konsep-konsep yang ada di dalam paradigma FP, fungsi yang<br> 
                    Anda buat akan bersifat reusable. Karena fungsi yang Anda buat merupakan pure<br> 
                    function, ia tidak akan dipengaruhi ataupun mempengaruhi keadaan di/dari luar. Hal ini<br>
                    tentu membuat fungsi dapat digunakan berkali-kali tanpa khawatir mendapatkan hasil<br>
                    di luar ekspektasi Anda.</p>
                    <br>
                        <li>Memanfaatkan ES6 Javasctipt</li>
                        <li>Memanfaatkan ES6 Javasctipt</li>
                        <li>Memanfaatkan ES6 Javasctipt</li>
                </br>

        
                <h1 class=" text-2xl  md:text-3xl font-bold text-blue-500 ">Kenapa Atom Bisa Ada</h1>
                <br>
                <p class="md:text-sm">Dengan menerapkan konsep-konsep yang ada di dalam paradigma FP, fungsi yang<br> 
                    Anda buat akan bersifat reusable. Karena fungsi yang Anda buat merupakan pure<br> 
                    function, ia tidak akan dipengaruhi ataupun mempengaruhi keadaan di/dari luar. Hal ini<br>
                    tentu membuat fungsi dapat digunakan berkali-kali tanpa khawatir mendapatkan hasil<br>
                    di luar ekspektasi Anda.<br>

                    <br> materi kali ini kita tidak berfokus untuk membuat banyak reusable function di<br> 
                    JavaScript. Kami percaya, dengan memahami konsep functional programming secara<br> 
                    matang, Anda dapat membuatnya sendiri sesuai kebutuhan.<br> 
                    
                    <br>
                    Alih-alih membuatnya sendiri, kita akan coba membahas dan menggunakan beberapa<br> 
                    reusable function yang sudah ada di JavaScript. Khususnya beberapa Higher-Order<br> 
                    Function yang dimiliki array, seperti map, filter, dan forEach.</p>
            </div>

            {{-- // sidebar --}}
            <div class="flex  h-40 sticky top-0 ">
            <div class="min-h-screen lg:flex" x-data="{ open: false }">
              <nav class="fixed inset-0 transform lg:transform-none lg:opacity-100 duration-200  lg:relative z-10 w-[300px] bg-white border text-white"
                  :class="{
                      'translate-x-full ease-in opacity-100': open === true,
                      '-translate-x-full ease-out opacity-0': open === false
                  }">
                  <div class="flex justify-center items-center">
                    <div class="p-3">
                        <img src="{{ asset('assets/images/Logo.png') }}" class="h-9" alt="Logo" />
                    </div>
                    
                    <button class="p-2 focus:outline-none lg:hidden flex items-center justify-center" @click="open = false">
                        <div class="text-black text-xl font-bold mt-3">
                            <ion-icon name="chevron-back-outline"></ion-icon>
                        </div>
                    </button>
                </div>

                <div class="flex flex-col justify-start items-start w-full space-y-4 text-black mt-10">
                  <div class="flex flex-row items-start justify-start px-6 py-2 hover:bg-blue-200 w-full cursor-pointer">
                      <div class="text-blue-600 text-xl">
                          <ion-icon name="grid"></ion-icon>
                      </div>
                      <a href="{{ route('b.manage.admin.index') }}" class="ml-3 font-light text-[15px]">Dashboard
                      </a>
                  </div>

                  <span class="text-center px-6 py-2">Menu</span>

                  @role('admin')
                      <div x-data="{ openDrop: false }" class="w-full" x-on:click="openDrop = !openDrop"  >
                          <div 
                              class="flex flex-row items-center justify-between px-6 py-1.5 hover:bg-blue-200 w-full cursor-pointer bg-slate-200">
                              <div class="flex">
                                <div >
                                    <ion-icon name="chevron-down-outline"></ion-icon>
                                </div>
                                  
                                  <span class="ml-3 font-light text-[15px]">Bagian 0 : Pendahuluan</span>

                              </div>

                              <span class="ml-3 font-bold text-[15px]">1/2</span>
                              
                          </div>

                          <div class="text-left text-sm w-4/5 mx-auto" x-show="openDrop"  >

                            <div class="flex flex-row items-center ">
                                <input type="checkbox" class="appearance-none checked:bg-blue-500 ..." />
                                <h1 class="cursor-pointer p-2  rounded-md">
                                    <a href="{{ route('b.manage.role.index') }}">Manajemen Role</a>
                                </h1>
                            </div>
                              
                            <div class="flex flex-row items-center">
                                <input type="checkbox" class="appearance-none checked:bg-blue-500 ..." />
                              <h1 class="cursor-pointer p-2 rounded-md">
                                  <a href="{{ route('b.manage.permission.index') }}">Manajemen Permission</a>
                              </h1>
                            </div>

                            <div class="flex flex-row items-center">
                             <input type="checkbox" class="appearance-none checked:bg-blue-500 ..." />
                              <h1 class="cursor-pointer p-2  rounded-md">
                                  <a href="{{ route('b.manage.user.index') }}">Manajemen Users</a>
                              </h1>
                            </div>

                          </div>
                      </div>
                  @else
                  @endrole

                  
              </div>
          </nav>
          {{-- end sidebar --}}

          {{-- Burger Button --}}
          <div class="relative z-0 lg:flex-grow">
              {{-- navbar --}}
              <header class="flex bg-black border-b text-white items-center px-2 rounded-md mt-10">
                  <button class="p-2 focus:outline-none rounded-md lg:hidden" @click="open = true">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                  </button>
                 
              </header>
              {{-- end navbar --}} {{-- content --}}
              <div class="flex flex-1 items-center justify-center">
                  @yield('content-admin')
              </div>
              {{-- end content --}}
          </div>
            </div>
                      </div>

                  </div>

    
    {{-- {Footer} --}}
    <div class="flex flex-col mt-54 my-20 mx-20  ">
        <span class="h-0.5 w-full bg-gray-400 lg:w-full"></span>
        <div class="flex justify-between items-center">

            <div class="flex flex-row">
            <div class="text-2xl pr-3">
                <ion-icon  name="chevron-back-circle-outline"></ion-icon>
            </div>
            <a href="#">Previouss</a>
        </div>

             <p class=" text-center md:text-lg my-5">Pendahuluan Kelas IPA</p>  

             <div class="flex flex-row" >

             <a href="#">Next</a>

            <div class="text-2xl pl-3">
                <ion-icon name="chevron-forward-circle-outline"></ion-icon>
            </div>
        </div>

        </div>
       
    </div>
@endsection