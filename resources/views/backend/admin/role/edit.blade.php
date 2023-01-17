@extends('backend.layouts.app')

@section('content-admin')
           {{-- content --}}
            <div class="flex flex-1 items-center justify-center">
                <div class="w-full mx-20 my-20">
                    <div class="py-5 font-bold">
                        <h2>Edit Role</h2>
                    </div>

                    <form action="{{route('backend.role.edit.process',$role->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="role" class="text-sm font-medium text-gray-900 block mb-2">Name Role</label>
                            <input type="text" value="{{ $role->name }}" id="role" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm" placeholder="Name Role" required="">
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                    </form>

                    <div class="py-5 font-bold">
                        <h2>Edit Permission Role</h2>
                    </div>

                    <div class="mb-4 flex items-center space-x-2">
                        @if ($role->permissions)
                        <span>Role has permission : </span>
                            @foreach ($role->permissions as $role_permission)
                                <form action="{{ route('b.manage.role.permission.revoke', [$role->id,$role_permission->id]) }}" class="flex" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 flex mr-2 text-sm bg-red-500 text-white rounded py-2">
                                           <div class="mr-2">X</div> {{$role_permission->name}}
                                        </button>
                                </form>
                            @endforeach
                        @endif
                    </div>

                    <div class="max-w-full">

                    <form action="{{route('b.manage.role.permission.edit',$role->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an option</label>
                            <select id="permission" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Permission</option>
                            @foreach ($permission as $data)
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



