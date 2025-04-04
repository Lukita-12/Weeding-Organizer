<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.pesanan.update', $pesanan->id) }}">
            @method('PUT')

            <div>
                <x-form.form-label for="tgl_pesanan">
                    Tanggal pesanan
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tgl_pesanan"
                    id="tgl_pesanan"
                    value="{{ $pesanan->tgl_pesanan }}"
                    placeholder="Tanggal pesanan..."
                    required />
                <x-form.form-error errorFor="tgl_pesanan" />
            </div>

            <div>
                <x-form.form-label for="pengantin_pria">
                    Nama pengantin pria
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="pengantin_pria"
                    id="pengantin_pria"
                    value="{{ $pesanan->pengantin_pria }}"
                    placeholder="Nama pengantin pria..."
                    required />
                <x-form.form-error errorFor="pengantin_pria" />
            </div>

            <div>
                <x-form.form-label for="pengantin_wanita">
                    Nama pengantin wanita
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="pengantin_wanita"
                    id="pengantin_wanita"
                    value="{{ $pesanan->pengantin_wanita }}"
                    placeholder="Nama pengantin wanita..."
                    required />
                <x-form.form-error errorFor="pengantin_wanita" />
            </div>

            <div>
                <x-form.form-label for="tanggal_acara">
                    Tanggal acara
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tanggal_acara"
                    id="tanggal_acara"
                    value="{{ $pesanan->tanggal_acara }}"
                    placeholder="Tanggal acara..."
                    required />
                <x-form.form-error errorFor="tanggal_acara" />
            </div>

            <div>
                <x-form.form-label for="tanggal_diskusi">
                    Tanggal diskusi
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tanggal_diskusi"
                    id="tanggal_diskusi"
                    value="{{ $pesanan->tanggal_diskusi }}"
                    placeholder="Tanggal diskusi..."
                    required />
                <x-form.form-error errorFor="tanggal_diskusi" />
            </div>

            <div>
                <a href="{{ url('/admin/pesanan') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>