<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.paket_pernikahan.store') }}">

            <div>
                <x-form.form-label for="nama_paket">
                    Nama paket
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_paket"
                    id="nama_paket"
                    :value="old('nama_paket')"
                    placeholder="Nama paket..."
                    required />
                <x-form.form-error errorFor="nama_paket" />
            </div>

            <div>
                <x-form.form-label for="venue">
                    Venue
                </x-form.form-label>
                <x-form.form-select
                    name="venue"
                    id="venue">
                    <option value="">Pilih Venue</option>
                    @foreach ($kerjasamas as $kerjasama)
                        <option value="{{ $kerjasama->id }}">{{ $kerjasama->requestmitra->nama_usaha }}</option>
                    @endforeach
                    </x-form.form-select>
                <x-form.form-error errorFor="venue" />
            </div>

            <div>
                <x-form.form-label for="dekorasi">
                    Dekorasi
                </x-form.form-label>
                <x-form.form-select
                    name="dekorasi"
                    id="dekorasi">
                    <option value="">Pilih Dekorasi</option>
                    @foreach ($kerjasamas as $kerjasama)
                        <option value="{{ $kerjasama->id }}">{{ $kerjasama->requestmitra->nama_usaha }}</option>
                    @endforeach
                </x-form.form-select>
                <x-form.form-error errorFor="dekorasi" />
            </div>

            <div>
                <x-form.form-label for="tata_rias">
                    Tata rias
                </x-form.form-label>
                <x-form.form-select
                    name="tata_rias"
                    id="tata_rias">
                    <option value="">Pilih Tata rias</option>
                    @foreach ($kerjasamas as $kerjasama)
                        <option value="{{ $kerjasama->id }}">{{ $kerjasama->requestmitra->nama_usaha }}</option>
                    @endforeach
                </x-form.form-select>
                <x-form.form-error errorFor="tata_rias" />
            </div>

            <div>
                <x-form.form-label for="staff_acara">
                    Staff acara
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="staff_acara"
                    id="staff_acara"
                    :value="old('staff_acara')"
                    placeholder="Staff acara..."
                     />
                <x-form.form-error errorFor="staff_acara" />
            </div>

            <div>
                <x-form.form-label for="catering">
                    Catering
                </x-form.form-label>
                <x-form.form-select
                    name="catering"
                    id="catering">
                    <option value="">Pilih Catering</option>
                    @foreach ($kerjasamas as $kerjasama)
                        <option value="{{ $kerjasama->id }}">{{ $kerjasama->requestmitra->nama_usaha }}</option>
                    @endforeach
                </x-form.form-select>
                <x-form.form-error errorFor="catering" />
            </div>

            <div>
                <x-form.form-label for="kue_pernikahan">
                    Kue pernikahan
                </x-form.form-label>
                <x-form.form-select
                    name="kue_pernikahan"
                    id="kue_pernikahan">
                    <option value="">Pilih Kue pernikahan</option>
                    @foreach ($kerjasamas as $kerjasama)
                        <option value="{{ $kerjasama->id }}">{{ $kerjasama->requestmitra->nama_usaha }}</option>
                    @endforeach
                </x-form.form-select>
                <x-form.form-error errorFor="kue_pernikahan" />
            </div>

            <div>
                <x-form.form-label for="fotografer">
                    Fotografer
                </x-form.form-label>
                <x-form.form-select
                    name="fotografer"
                    id="fotografer">
                    <option value="">Pilih Fotografer</option>
                    @foreach ($kerjasamas as $kerjasama)
                        <option value="{{ $kerjasama->id }}">{{ $kerjasama->requestmitra->nama_usaha }}</option>
                    @endforeach
                </x-form.form-select>
                <x-form.form-error errorFor="fotografer" />
            </div>

            <div>
                <x-form.form-label for="entertaiment">
                    Entertaiment
                </x-form.form-label>
                <x-form.form-select
                    name="entertaiment"
                    id="entertaiment" >
                    <option value="">Pilih Entertaiment</option>
                    @foreach ($kerjasamas as $kerjasama)
                        <option value="{{ $kerjasama->id }}">{{ $kerjasama->requestmitra->nama_usaha }}</option>
                    @endforeach
                </x-form.form-select>
                <x-form.form-error errorFor="entertaiment" />
            </div>

            <div>
                <x-form.form-label for="hargaDP_paket">
                    Harga DP Rp.
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="hargaDP_paket"
                    id="hargaDP_paket"
                    step="0.01"
                    min="0"
                    :value="old('hargaDP_paket')"
                    placeholder="999.999.999"
                    oninput="formatRupiah(this)"
                    required />
                <x-form.form-error errorFor="hargaDP_paket" />
            </div>

            <div>
                <x-form.form-label for="hargaLunas_paket">
                    Harga lunas Rp.
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="hargaLunas_paket"
                    id="hargaLunas_paket"
                    step="0.01"
                    min="0"
                    :value="old('hargaLunas_paket')"
                    placeholder="999.999.999"
                    oninput="formatRupiah(this)"
                    required />
                <x-form.form-error errorFor="hargaLunas_paket" />
            </div>

            <div>
                <x-form.form-label for="status_paket">
                    Status paket pernikahan
                </x-form.form-label>
                <x-form.form-select
                    name="status_paket"
                    id="status_paket"
                    required>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak tersedia">Tidak tersedia</option>
                    <option value="Exclusive">Exclusive</option>
                </x-form.form-select>
                <x-form.form-error errorFor="status_paket" />
            </div>

            <div>
                <a href="{{ url('/admin/paket-pernikahan') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>