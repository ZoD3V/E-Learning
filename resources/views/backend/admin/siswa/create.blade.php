@extends('backend.layouts.app')

@section('content-admin')
    {{-- content --}}
    <div class="flex flex-1 items-center justify-center">
        <div class="w-full mx-20 my-20">
            <div class="py-5 font-bold">
                <h2>Create siswa</h2>
            </div>
            <form action="{{ route('b.manage.siswa.create.process') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="role" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                    <input type="text" id="role" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm"
                        placeholder="Name" required="">
                </div>
                <div class="mb-6">
                    <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                    <input type="text" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm"
                        placeholder="Email" required="">
                </div>
                <div class="mb-6">
                    <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm"
                        placeholder="Password" required="">
                </div>
                <div class="mb-6">
                    <label for="sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                        an option</label>
                    <select id="permission" name="sekolah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Sekolah</option>
                        @foreach ($sekolah as $data)
                            @if ($data->name !== null)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
            </form>

        </div>
    </div>
    </div>
    {{-- end content --}}
@endsection
