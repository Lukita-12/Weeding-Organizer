<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.requestmitra.update', $requestmitra->id) }}">
            @method('PUT')

            <div>
                <x-form.form-label for="pelanggan_id">
                    Pelanggan
                </x-form.form-label>
                <x-form.form-select
                    name="pelanggan_id"
                    id="pelanggan_id"
                    required>
                        <option value="{{ $requestmitra->pelanggan->id }}">{{ $requestmitra->pelanggan->nama_pelanggan }}</option>
                </x-form.form-select>
                <x-form.form-error errorFor="pelanggan_id" />
            </div>
        
            <div>
                <x-form.form-label for="nama_usaha">
                    Nama usaha
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_usaha"
                    id="nama_usaha"
                    value="{{ $requestmitra->nama_usaha }}"
                    placeholder="Nama usaha..."
                    required />
                <x-form.form-error errorFor="nama_usaha" />
            </div>

            <div>
                <x-form.form-label for="jenis_usaha">
                    Jenis usaha
                </x-form.form-label>
                <x-form.form-select
                    name="jenis_usaha"
                    id="jenis_usaha"
                    required>
                    <option value="{{ $requestmitra->jenis_usaha }}">{{ $requestmitra->jenis_usaha }}</option>
                    <option value="Dekorasi">Dekorasi</option>
                    <option value="Tata rias">Tata rias</option>
                    <option value="Kue pernikahan">Kue pernikahan</option>
                </x-form.form-select>
                <x-form.form-error errorFor="jenis_usaha" />
            </div>

            <div>
                <x-form.form-label for="nama_pemilik">
                    Pemilik usaha
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_pemilik"
                    id="nama_pemilik"
                    value="{{ $requestmitra->nama_pemilik }}"
                    placeholder="Pemilik usaha..."
                    required />
                <x-form.form-error errorFor="nama_pemilik" />
            </div>

            <div>
                <a href="{{ url('/admin/requestmitra') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>