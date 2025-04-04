<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.pembayaran.update', $pembayaran->id) }}" enctype="multipart/form-data">
            @method('PUT')
        
            <div>
                <x-form.form-label for="tgl_pembayaran">
                    Tanggal pembayaran
                </x-form.form-label>
                <x-form.form-input
                    type="date"
                    name="tgl_pembayaran"
                    id="tgl_pembayaran"
                    value="{{ $pembayaran->tgl_pembayaran }}"
                    />
                <x-form.form-error errorFor="tgl_pembayaran" />
            </div>

            <div>
                <x-form.form-label for="bukti_pembayaran">
                    Bukti pembayaran
                </x-form.form-label>
                <x-form.form-input
                    type="file"
                    name="bukti_pembayaran"
                    id="bukti_pembayaran"
                    accept="image/*"
                    placeholder="Bukti pembayaran..."
                    />
                @if($pembayaran->bukti_pembayaran)
                    <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" width="100">
                @endif
                <x-form.form-error errorFor="bukti_pembayaran" />
            </div>

            <div>
                <x-form.form-label for="bayar_dp">
                    Bayar DP
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="bayar_dp"
                    id="bayar_dp"
                    value="{{ $pembayaran->bayar_dp }}"
                    placeholder="Bayar DP..."
                    required />
                <x-form.form-error errorFor="bayar_dp" />
            </div>

            <div>
                <x-form.form-label for="bayar_lunas">
                    Bayar lunas
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="bayar_lunas"
                    id="bayar_lunas"
                    value="{{ $pembayaran->bayar_lunas }}"
                    placeholder="Bayar lunas..."
                    required />
                <x-form.form-error errorFor="bayar_lunas" />
            </div>

            <div>
                <a href="{{ url('/admin/pembayaran') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>