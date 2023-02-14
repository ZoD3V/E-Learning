@extends('layouts.app')



@section('content')
    <div>

        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 fixed w-full shadow-md">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <div>
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('assets/images/Logo.png') }}" class="h-9" alt="Flowbite Logo" />
                    </a>
                </div>
                <div>
                    <button type="button"
                        class="text-black border-2 border-blue-700 hover:bg-blue-800 focus:ring-4 hover:text-white focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a
                            href="{{ route('login') }}">{{ __('Masuk') }}</a></button>

                </div>
            </div>
        </nav>


        <div class="grid grid-cols-1 lg:grid-cols-2 h-screen w-full">
            <div class="hidden lg:flex lg:items-center lg:justify-center lg:flex-col">
                <img src="{{ asset('assets/images/enterLogo.png') }}" alt="" />
                <p>If You want to, you’ll find a way</p>
            </div>

            <div class=" flex flex-col justify-center">
                <form method="POST" action="{{ route('login') }}"
                    class="max-w-[400px] w-[80%] mx-auto shadow-[0px_0px_3px_rgba(3,102,214,0.3)] p-5 rounded-lg">
                    @csrf
                    <h2 class="text-blue-500 font-bold text-2xl mb-6 text-center">
                        Login
                    </h2>
                    <div class="mb-6">
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="email" />
                        @error('email')
                            <span class="text-red-500 text-sm" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300  text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="password" />

                        @error('password')
                            <span class="text-red-500 text-sm" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label name="remember" id="remember"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Remember Me') }}</label>
                        </div>
                        <p class=" my-2 text-sm cursor-pointer ">
                            Forgot Password
                        </p>
                    </div>

                    <button type="submit"
                        class="text-white w-full mb-[15px] mt-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        {{ __('Login') }}
                    </button>
                    <div class="flex justify-center items-center text-sm">
                        <p class="mb-2 mt-2">
                            Belum punya akun?
                        <div class="font-bold ml-1.5">
                            Daftar Sekarang
                        </div>
                        </p>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
