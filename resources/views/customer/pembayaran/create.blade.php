<x-layout>

    <div>
        <x-form.form-layout action="{{ route('customer.pembayaran.store') }}" enctype="multipart/form-data">
            <div>
                <x-form.form-input type="hidden" name="pesanan_id" id="pesanan_id" value="{{ $pesanan->id }}" />
            </div>

            <div>Nama pemesan</div>
            <div>
                No. Telpon
            </div>

            <div>Email</div>

            <div>Jenis pembayaran</div>
            
            <div>Total pembayaran</div>

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
                    required />
                <x-form.form-error errorFor="bukti_pembayaran" />
            </div>

            <div>
                <x-form.form-label for="bayar_dp">
                    Bayar dp
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="bayar_dp"
                    id="bayar_dp"
                    :value="old('bayar_dp')"
                    placeholder="Bayar dp..."
                    />
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
                    :value="old('bayar_lunas')"
                    placeholder="Bayar lunas..."
                    />
                <x-form.form-error errorFor="bayar_lunas" />
            </div>

            <div>
                <h1>Harga DP: {{ $pesanan->paketPernikahan->hargaDP_paket }}</h1>
            </div>

            <div>
                <h1>Harga lunas: {{ $pesanan->paketPernikahan->hargaLunas_paket }}</h1>
            </div>

            <div>Transfer Bank:</div>

            <div>
                <a href="{{ url('/customer/pesanan') }}">Batal</a>
                <button type="submit">Bayar</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>