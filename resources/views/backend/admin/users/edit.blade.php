@extends('backend.layouts.app')

@section('content-admin')
{{-- content --}}
            <div class="flex flex-1 items-center justify-center">
                <div class="w-full mx-20 my-20">
                    <div class="py-5 font-bold">
                        <h2>Edit User</h2>
                    </div>

                    <form action="{{route('backend.user.edit.process',$user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name User</label>
                            <input type="text" value="{{ $user->name }}" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm" placeholder="Name User" required="">
                        </div>

                        <div class="mb-6">
                            <label for="sekolah" class="text-sm font-medium text-gray-900 block mb-2">Name Sekolah</label>
                            <input type="text" value="{{ $user->sekolah }}" id="sekolah" name="sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm" placeholder="Name Sekolah" required="">
                        </div>

                        <div class="mb-6">
                            <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Name Email</label>
                            <input type="text" value="{{ $user->email }}" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm" placeholder="Name Email" required="">
                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                    </form>

                    <div class="py-5 font-bold">
                        <h2>Edit User Role</h2>
                    </div>

                    <div class="mb-4 flex items-center space-x-2">
                        @if ($user->roles)
                        <span>User has Role : </span>
                            @foreach ($user->roles as $user_role)
                                <form action="{{route('backend.user.delete.role',[$user->id,$user_role->id])}}" class="flex" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 flex mr-2 text-sm bg-red-500 text-white rounded py-2">
                                           <div class="mr-2">X</div> {{$user_role->name}}
                                        </button>
                                </form>
                            @endforeach
                        @endif
                    </div>

                    <div class="max-w-full">

                    <form action="{{route('backend.user.edit.assign.role',$user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an option</label>
                            <select id="permission" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Role</option>
                            @foreach ($role as $data)
                                <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Assign</button>
                    </form>

                    </div>

                </div>
            </div>
        </div>
            {{-- end content --}}
@endsection



