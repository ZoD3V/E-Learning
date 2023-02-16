@extends('backend.layouts.app')

@section('content-admin')
    <div class="flex flex-col min-w-full">
        <div class="flex flex-wrap justify-evenly w-full pt-5">
            <div class="md:w-1/3 lg:w-1/4 w-1/2 py-4 px-4">
                <div
                    class=" flex shadow p-5 rounded-lg justify-between items-center text-gray-800 hover:shadow-lg w-full bg-orange-400">
                    <div class="flex flex-col">
                        <div class="text-md font-bold text-white text-start ">{{ $kelas->count() }}</div>
                        <div class="text-md font-bold text-white text-start ">Kelas</div>
                    </div>

                    <div class="text-white text-5xl">
                        <ion-icon name="clipboard"></ion-icon>
                    </div>

                </div>

            </div>


            <div class="md:w-1/3 lg:w-1/4 w-1/2 py-4 px-4">
                <div
                    class=" flex shadow p-5 rounded-lg justify-between items-center text-gray-800 hover:shadow-lg w-full bg-green-400">
                    <div class="flex flex-col">
                        <div class="text-md font-bold text-white text-start ">120</div>
                        <div class="text-md font-bold text-white text-start ">Siswa</div>
                    </div>

                    <div class="text-white text-5xl">
                        <ion-icon name="school"></ion-icon>
                    </div>

                </div>

            </div>

            <div class="md:w-1/3 lg:w-1/4 w-1/2 py-4 px-4">
                <div
                    class=" flex shadow p-5 rounded-lg justify-between items-center text-gray-800 hover:shadow-lg w-full bg-purple-400">
                    <div class="flex flex-col">
                        <div class="text-md font-bold text-white text-start ">{{ $guru }}</div>
                        <div class="text-md font-bold text-white text-start ">Guru</div>
                    </div>

                    <div class="text-white text-5xl">
                        <ion-icon name="tablet-landscape"></ion-icon>
                    </div>

                </div>

            </div>
        </div>
        <div class="flex min-w-full items-center justify-center ">
            <div class="flex justify-center items-center py-4 px-4 w-full md:w-[75%]">
                <div
                    class=" flex flex-col shadow rounded-lg justify-between items-center text-gray-800 hover:shadow-lg w-full bg-white">
                    <div class="p-3 bg-blue-300 w-full rounded-t-lg">
                        <div class="font-bold text-white">Info Profile</div>
                    </div>
                    <div class="flex flex-col h-32 items-center justify-center gap-2 w-full">
                        <div class="flex items-center justify-between font-bold w-1/2">
                            <div>Nama:</div>
                            <div>{{ auth()->user()->name }}</div>
                        </div>
                        <div class="flex  justify-between font-bold text-start w-1/2">
                            <div>Nama Sekolah:</div>
                            <div>{{ auth()->user()->service_sekolah->name }}</div>
                        </div>
                        <div class="flex  justify-between font-bold  w-1/2">
                            <div>Email:</div>
                            <div>{{ auth()->user()->email }}</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
