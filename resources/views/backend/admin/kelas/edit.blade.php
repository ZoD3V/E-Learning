@extends('backend.layouts.app')

@section('content-admin')
    {{-- content --}}
    <div class="flex flex-1 items-center justify-center">
        <div class="w-full mx-20 my-20">
            <div class="py-5 font-bold">
                <h2>Edit Kelas</h2>
            </div>

            <form action="{{ route('backend.kelas.edit.process', $kelas->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name Kelas</label>
                    <input type="text" value="{{ $kelas->name }}" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm"
                        placeholder="Name Kelas" required="">
                </div>

                @role('admin')
                    <div class="mb-6">
                        <select id="sekolah_id" name="sekolah_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Choose a Sekolah</option>
                            @foreach ($sekolah as $data)
                                <option value="{{ $data->id }}" @selected($data->name == $kelas->service_kelas_sekolah->name)>{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                @endrole

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
            </form>



        </div>
    </div>
    </div>
    {{-- end content --}}
@endsection
