<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Siswa
            </h2>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-md rounded-2xl">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <h3 class="font-semibold text-lg text-gray-800">
                    Detail Siswa
                </h3>
                @if(auth()->user()->role === 'tatausaha' || auth()->user()->role === 'kepalasekolah')
                <div class="mb-4">
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari siswa..."
                        class="w-full sm:w-64 h-10 px-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>
                @endif
                @if(auth()->user()->role === 'admin')
                <a href="{{ route('siswa.create') }}" class="inline-block px-6 py-2.5 text-white bg-blue-600 hover:bg-blue-700 font-medium text-sm rounded-lg shadow-md transition">Tambah Siswa</a>
                @endif

            </div>

            @if($siswa->isEmpty())
            <p class="mt-2 text-gray-500">Data siswa tidak tersedia.</p>
            @else
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left border-separate border-spacing-0 mt-4">
                    <thead>
                        <tr class="bg-white text-gray-600">
                            <th class="py-3 px-4 text-sm font-medium">No</th>
                            <th class="py-3 px-4 text-sm font-medium">Nama</th>
                            <th class="py-3 px-4 text-sm font-medium">Email</th>
                            <th class="py-3 px-4 text-sm font-medium">NISN</th>

                            @if(auth()->user()->role === 'tatausaha' || auth()->user()->role === 'kepalasekolah')
                            <th class="py-3 px-4 text-sm font-medium">Kelas</th>
                            <th class="py-3 px-4 text-sm font-medium">Alamat</th>
                            <th class="py-3 px-4 text-sm font-medium">No Telepon</th>
                            <th class="py-3 px-4 text-sm font-medium">Orang tua</th>
                            <th class="py-3 px-4 text-sm font-medium">Status</th>
                            <th class="py-3 px-4 text-sm font-medium">Aksi</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $key => $data)

                        <tr class="border-b hover:bg-gray-50 transition duration-300">
                            <td class="py-3 px-4 text-sm">{{ $key+1 }}</td>
                            <td class="py-3 px-4 text-sm">{{ $data->nama }}</td>
                            <td class="py-3 px-4 text-sm">{{ $data->email }}</td>
                            <td class="py-3 px-4 text-sm">{{ $data->nisn }}</td>

                            @if(auth()->user()->role === 'tatausaha' || auth()->user()->role === 'kepalasekolah')
                            <td class="py-3 px-4 text-sm">
                                {{ $data->kelas ? $data->kelas->nama_kelas : 'Kelas Tidak Ditemukan' }}
                            </td>
                            <td class="py-3 px-4 text-sm">{{ $data->alamat }}</td>
                            <td class="py-3 px-4 text-sm">{{ $data->no_telepon }}</td>
                            <td class="py-3 px-4 text-sm">
                                {{ optional($data->orangtuaUser)->name ?? '-' }}
                            </td>
                            <td class="py-3 px-4 text-sm">
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $data->status === 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $data->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-sm space-x-2">
                                <a href="{{ route('siswa.show', $data->id) }}" class="inline-block text-sm text-blue-600 hover:underline">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>

                                @if(auth()->user()->role === 'tatausaha')
                                <a href="{{ route('siswa.edit', $data->id) }}" class="inline-block text-sm text-yellow-600 hover:underline">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const tableRows = document.querySelectorAll("tbody tr");

            searchInput.addEventListener("keyup", function() {
                const searchTerm = this.value.toLowerCase();

                tableRows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    row.style.display = rowText.includes(searchTerm) ? "" : "none";
                });
            });
        });
    </script>
    @endpush

</x-app-layout>