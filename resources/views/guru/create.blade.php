<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Tambah Guru
            </h2>
        </div>
    </x-slot>


    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-md rounded-2xl">
            <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <x-input label="Nama" name="nama" required />
                    </div>

                    <div>
                        <x-input label="Email" name="email" type="email" required />
                    </div>

                    <div>
                        <x-input label="Password" name="password" type="password" required />
                    </div>

                    <div>
                        <x-input label="Konfirmasi Password" name="password_confirmation" type="password" required />
                    </div>

                    <div>
                        <x-input label="NIP" name="nip" required />
                    </div>

                    <!-- <div>
                        <x-input label="Tanggal Lahir" name="tanggal_lahir" type="date" />
                    </div>

                    <div>
                        <x-select name="jenis_kelamin" label="Jenis Kelamin" :options="['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan']" />
                    </div>

                    <div>
                        <x-input label="No Telepon" name="no_telepon" />
                    </div>

                    <div>
                        <x-select name="status" label="Status" :options="['Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif']" />
                    </div>

                    <div>
                        <x-input label="Foto" name="foto" type="file" />
                    </div> -->
                </div>
<!-- 
                <div class="mt-4">
                    <x-textarea name="alamat" label="Alamat" rows="3" />
                </div> -->

                {{-- Tombol --}}
                <div class="flex justify-end mt-8">
                    <a href="{{ route('guru.index') }}"
                        class="inline-block px-5 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg mr-3 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-block px-6 py-2.5 text-white bg-blue-600 hover:bg-blue-700 font-medium text-sm rounded-lg shadow-md transition">
                        Simpan Guru
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>