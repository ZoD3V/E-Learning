@extends('backend.layouts.app')


@section('content-admin')
{{-- content --}}
            <div class="flex flex-1 items-center justify-center">
                <div class="w-full mx-20 my-20">
                    <div class="py-5 font-bold">
                        <h2>Edit Permission</h2>
                    </div>

                    <form action="{{route('backend.permission.edit.process',$permission->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="role" class="text-sm font-medium text-gray-900 block mb-2">Name Permission</label>
                            <input type="text" value="{{ $permission->name }}" id="role" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm" placeholder="Name Role" required="">
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                    </form>

                </div>
            </div>
        </div>
            {{-- end content --}}
@endsection



