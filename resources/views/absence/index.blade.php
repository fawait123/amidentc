<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Absensi') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Rekap absensi di ambil setiap hari. Rekap absensi
                                dibawah ini merupakan hasil rekap tanggal <span
                                    class="font-bold text-blue-500">{{ date('d M Y') }}</span></p>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300 border">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                NO</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Nama Partisipan</th>

                                            @foreach ($posts as $item)
                                                <th scope="col"
                                                    class="text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    {{ $item }}
                                                </th>
                                            @endforeach

                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($participants as $item)
                                            <tr class="even:bg-gray-50">
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 uppercase">
                                                    {{ $loop->iteration }}.
                                                </td>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 uppercase">
                                                    {{ $item->name }}
                                                </td>
                                                @for ($i = 0; $i < count($posts); $i++)
                                                    <td class="text-sm font-semibold text-gray-900">
                                                        <div
                                                            class="w-full h-[70px] text-white flex justify-center items-center rounded-md {{ $item[join(explode(' ', $posts[$i]))] == 1 ? 'bg-blue-500' : 'bg-red-500' }}">
                                                            <span class="font-bold uppercase">
                                                                {{ $item[join(explode(' ', $posts[$i]))] == 1 ? 'Hadir' : 'Tidak Hadir' }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                @endfor
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
