<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Selamat Datang, ' . auth()->user()->name) }}
                </div>
            </div>
            <div class="my-10 grid grid-cols-2 gap-4">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 flex justify-center items-center gap-2 flex-col">
                    <h1 class="text-[100px] font-bold text-slate-400">{{ $total_user }}</h1>
                    <h6 class="font-bold text-[24px]">TOTAL PENGGUNA</h6>
                </div>
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 flex justify-center items-center gap-2 flex-col">
                    <h1 class="text-[100px] font-bold text-slate-400">{{ $total_participant }}</h1>
                    <h6 class="font-bold text-[24px]">TOTAL PARTISIPAN</h6>
                </div>
                {{-- <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 flex justify-center items-center gap-2 flex-col">
                    <h1 class="text-[100px] font-bold text-slate-400">{{ $total_education }}</h1>
                    <h6 class="font-bold text-[24px]">TOTAL EDUKASI</h6>
                </div> --}}
            </div>
            <div class="my-10 grid grid-cols-1 gap-4">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 flex justify-center items-center gap-2 flex-col">
                    <h1 class="text-[100px] font-bold text-slate-400">{{ $total_quiz }}</h1>
                    <h6 class="font-bold text-[24px]">TOTAL KUIS</h6>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
