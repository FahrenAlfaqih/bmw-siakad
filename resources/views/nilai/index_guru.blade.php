<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Nilai
            </h2>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-md rounded-2xl">
            @if ($nilaiList->isEmpty())
            <p class="text-gray-500">Data nilai tidak tersedia.</p>
            @else
            <div class="flex flex-wrap sm:flex-nowrap justify-between items-end mb-4">
                <h3 class="font-bold text-lg text-gray-800 mb-4">Nilai Siswa</h3>

                <form method="GET" class="flex flex-wrap gap-3 sm:gap-4 items-end">
                    {{-- Semester --}}
                    <div>
                        <select name="semester_id"
                            class="text-sm px-3 py-2 border border-gray-300 rounded-2xl shadow-sm bg-gray-300 text-black font-medium transition hover:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Semester --</option>
                            @foreach ($semesters as $sem)
                            <option value="{{ $sem->id }}" {{ $sem->id == $semester_id ? 'selected' : '' }}>
                                Semester {{ $loop->iteration }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Kelas --}}
                    <div>
                        <select name="kelas_id"
                            class="text-sm px-3 py-2 border border-gray-300 rounded-2xl shadow-sm bg-gray-300 text-black transition font-medium hover:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Kelas --</option>
                            @foreach ($kelasList as $kelas)
                            <option value="{{ $kelas->id }}" {{ $kelas->id == $kelas_id ? 'selected' : '' }}>
                                {{ $kelas->nama_kelas }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Mapel --}}
                    <div>
                        <select name="mapel_id"
                            class="text-sm px-3 py-2 border border-gray-300 rounded-2xl shadow-sm bg-gray-300 text-black transition font-medium hover:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Mata Pelajaran --</option>
                            @foreach ($mapelList as $mapel)
                            <option value="{{ $mapel->id }}" {{ $mapel->id == $mapel_id ? 'selected' : '' }}>
                                {{ $mapel->nama_mapel }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tombol Filter --}}
                    <div>
                        <button type="submit"
                            class="mt-5 text-sm px-4 py-2 border border-blue-500 text-blue-600 rounded-2xl shadow-sm transition hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <i class="fas fa-filter mr-1"></i> Filter
                        </button>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left border-separate border-spacing-0">
                    <thead>
                        <tr class="bg-white text-gray-600">
                            <th class="py-3 px-4 text-sm font-medium"> No</th>
                            <th class="py-3 px-4 text-sm font-medium">Nama Siswa</th>
                            <th class="py-3 px-4 text-sm font-medium">Kelas</th>
                            <th class="py-3 px-4 text-sm font-medium">Mapel</th>
                            <th class="py-3 px-4 text-sm font-medium">Ulangan Harian</th>
                            <th class="py-3 px-4 text-sm font-medium">Quiz</th>
                            <th class="py-3 px-4 text-sm font-medium">Tugas</th>
                            <th class="py-3 px-4 text-sm font-medium">Total Nilai Harian</th>
                            <th class="py-3 px-4 text-sm font-medium">UTS</th>
                            <th class="py-3 px-4 text-sm font-medium">UAS</th>
                            <th class="py-3 px-4 text-sm font-medium">Rata-rata</th>
                            <th class="py-3 px-4 text-sm font-medium">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilaiList as $key => $nilai)
                        <tr class="border-b hover:bg-gray-50 transition duration-300">
                            <td class="py-3 px-4 text-sm">{{ $key + 1 }}</td>
                            <td class="py-3 px-4 text-sm">{{ $nilai->siswa->nama ?? '-' }}</td>
                            <td class="py-3 px-4 text-sm">{{ $nilai->kelas->nama_kelas ?? '-' }}</td>
                            <td class="py-3 px-4 text-sm">{{ $nilai->mapel->nama_mapel ?? '-' }}</td>
                            <td class="py-3 px-4 text-sm">{{ $nilai->nilai_ulangan_harian }}</td>
                            <td class="py-3 px-4 text-sm">{{ $nilai->nilai_quiz }}</td>
                            <td class="py-3 px-4 text-sm">{{ $nilai->nilai_tugas }}</td>
                            <td class="py-3 px-4 text-sm font-semibold text-blue-600">{{ $nilai->nilai_harian }}</td>
                            <td class="py-3 px-4 text-sm">{{ $nilai->nilai_uts }}</td>
                            <td class="py-3 px-4 text-sm">{{ $nilai->nilai_uas }}</td>
                            <td class="py-3 px-4 text-sm font-semibold text-blue-600">
                                {{ isset($nilai->rata_rata) ? number_format($nilai->rata_rata, 2) : '-' }}
                            </td>
                            <td class="py-3 px-4 text-sm font-bold text-white">
                                @if ($nilai)
                                <span class="@switch($nilai->grade)
                                @case('A') bg-green-500 @break
                                @case('AB') bg-green-700 @break
                                @case('B') bg-blue-500 @break
                                @case('C') bg-yellow-500 text-gray-800 @break
                                @case('D') bg-orange-500 @break
                                @case('E') bg-red-500 @break
                                @default bg-gray-400
                            @endswitch px-3 py-1 rounded-full text-xs inline-block">
                                    {{ $nilai->grade }}
                                </span>
                                @else
                                <span class="bg-gray-400 px-2 py-1 rounded">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>