@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<style>
/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568; 			/*text-gray-700*/
			padding-left: 1rem; 		/*pl-4*/
			padding-right: 1rem; 		/*pl-4*/
			padding-top: .5rem; 		/*pl-2*/
			padding-bottom: .5rem; 		/*pl-2*/
			line-height: 1.25; 			/*leading-tight*/
			border-width: 2px; 			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7; 		/*border-gray-200*/
			background-color: #edf2f7; 	/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;	/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button		{
			font-weight: 700;				/*font-bold*/
			border-radius: .25rem;			/*rounded*/
			border: 1px solid transparent;
            padding: 5px;	/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current	{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important; /*bg-indigo-500*/
		}

</style>
@endsection

@section('javascript')

    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#users').DataTable({
                responsive: true
            }).columns.adjust()
            .responsive.recalc();
        })
    </script>
    </script>


@endsection

@section('content')
<div class="w-full max-h-screen flex flex-col">
     {{-- sidebar --}}
    <div class="min-h-screen lg:flex" x-data="{open: false}">
        <nav
            class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative z-10 w-[250px] bg-white border-r text-white h-screen"
            :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': open === false}"
        >
            <div class="flex justify-center items-center">
                <div class="p-3"><img src="{{asset('assets/images/Logo.png')}}" class="h-9" alt="Logo" /></div>
                <button
                    class="p-2 focus:outline-none lg:hidden flex items-center justify-center"
                    @click="open = false"
                >
                    <div class="text-black text-xl font-bold mt-3"><ion-icon name="chevron-back-outline"></ion-icon></div>
                </button>
            </div>

            <div class="flex flex-col justify-start items-start w-full space-y-4 text-black mt-10 ">
            <div class="flex flex-row items-start justify-start px-6 py-2 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="grid"></ion-icon>
                </div>
            <span class="ml-3 font-light">Dashboard</span>
            </div>

            <span class="text-center px-6 py-2">Menu</span>

            <div x-data='{openDrop:false}' class="w-full">
                <div class="flex flex-row items-center justify-between px-6 py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="flex">
                    <div class="text-blue-600 text-xl">
                        <ion-icon name="people-circle-outline"></ion-icon>
                    </div>
                        <span class="ml-3 font-light text-[15px]">Manajemen Admin</span>
                    </div>
                    <div x-on:click="openDrop = !openDrop"><ion-icon name="chevron-down-outline"></ion-icon></div>
                </div>

                <div class="text-left text-sm w-4/5 mx-auto" x-show="openDrop" @click.outside="openDrop = false">
                    <h1 class="cursor-pointer p-2 hover:bg-blue-200 rounded-md "><a href="{{route('b.manage.role.index')}}">Manajemen Role</a></h1>
                    <h1 class="cursor-pointer p-2 hover:bg-blue-200 rounded-md ">Manajemen Permission</h1>
                    <h1 class="cursor-pointer p-2 hover:bg-blue-200 rounded-md ">Manajemen Users</h1>
                </div>
            </div>

            <div class="flex flex-row items-start justify-start px-6 py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="tablet-landscape"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Guru</span>
            </div>

            <div class="flex flex-row items-start justify-start px-6  py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="school"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Siswa</span>
            </div>


            <div class="flex flex-row items-start justify-start px-6  py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="phone-portrait"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Mapel</span>
            </div>

            <div class="flex flex-row items-start justify-start px-6  py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="book"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Materi</span>
            </div>


            <div class="flex flex-row items-center justify-start px-6  py-1.5 hover:bg-blue-200 w-full cursor-pointer">
                <div class="text-blue-600 text-xl">
                    <ion-icon name="clipboard"></ion-icon>
                </div>
            <span class="ml-3 font-light text-[15px]">Manajemen Kelas</span>
            </div>
        </div>
        </nav>
         {{-- end sidebar --}}
        <div class="relative z-0 lg:flex-grow">
             {{-- navbar --}}
            <header class="flex bg-white border-b text-black items-center px-2">
                <button
                    class="p-2 focus:outline-none rounded-md lg:hidden"
                    @click="open = true"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
                <div class="w-full max-w-full">
                    <div class="h-[60px] border-b w-full flex items-center justify-end">
                     <div class="rounded-md px-5 text-black items-center flex">
                            <ion-icon name="create"></ion-icon>
                    <span class="p-2">Edit Profile</span>
                </div>
                <div class="bg-red-500 rounded-md px-5 text-white items-center flex cursor-pointer mr-2">
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
            </header>
             {{-- end navbar --}}
            {{-- content --}}
                <div class="flex flex-1 items-center justify-center">
            <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 mt-10">
			 <div class="p-8 mt-6 lg:mt-0 rounded border bg-white">
				<table id="users" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <div class="p-2 rounded mb-5 bg-blue-500 text-white text-center cursor-pointer">
                    <a href="{{route('b.manage.role.create')}}" >Create</a>

                    </div>
					<thead>
                        <tr class="bg-blue-400 bg-opacity-100 text-white">
                            <th class="px-2">ID</th>
                            <th class="px-2">Name</th>
                            <th class="px-2">Action</th>
                        </tr>
					</thead>
					<tbody>
                        @foreach ($permissions as $data)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                            <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$loop->iteration}}</td>
                            <td class="text-md text-gray-900 font-light px-2 py-4 whitespace-nowrap">
                                {{$data->name}}
                            </td>
                            <td class="text-md text-gray-900 font-light px-5 py-4 whitespace-nowrap">
                                <a href=""><ion-icon name="create-outline"></ion-icon></a>
                                <a href=""><ion-icon name="trash-outline"></ion-icon></a>
                            </td>
                        </tr>
                        @endforeach

					</tbody>
				</table>
			</div>
      </div>
                </div>
            {{-- end content --}}
        </div>
</div>

</div>
@endsection



