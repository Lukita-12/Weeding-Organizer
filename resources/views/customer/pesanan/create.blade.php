<x-layout>

    <div>
        <x-form.form-layout action="{{ route('customer.pesanan.store') }}">
            
            <div>
                <x-form.form-input type="hidden" name="paket_pernikahan_id" value="{{ $paketPernikahan->id }}" />
            </div>

            <div>
                <p>Paket pernikahan: </p>
                <h1>{{ $paketPernikahan->nama_paket }}</h1>
            </div>

            <div>
                <x-form.form-label for="pengantin_pria">
                    Nama pengantin pria
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="pengantin_pria"
                    id="pengantin_pria"
                    :value="old('pengantin_pria')"
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
                    :value="old('pengantin_wanita')"
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
                    :value="old('tanggal_acara')"
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
                    :value="old('tanggal_diskusi')"
                    placeholder="Tanggal diskusi..."
                    required />
                <x-form.form-error errorFor="tanggal_diskusi" />
            </div>

            <div>
                <a href="{{ url('/customer/paket-pernikahan') }}">Batal</a>
                <button type="submit">Buat pesan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>