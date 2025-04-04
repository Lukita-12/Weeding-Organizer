<x-layout>

    <div>
        <x-form.form-layout action="{{ route('customer.kerjasama.store') }}">

            <div>
                <x-form.form-label for="pelanggan_id">
                    Pelanggan
                </x-form.form-label>
                <x-form.form-select
                    name="pelanggan_id"
                    id="pelanggan_id"
                    :value="old('pelanggan_id')"
                    required>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                    @endforeach                    
                </x-form.form-select>
                <x-form.form-error errorFor="pelanggan_id" />
            </div>

            <div>
                <x-form.form-label for="requestmitra_id">
                    Request mitra
                </x-form.form-label>
                <x-form.form-select
                    name="requestmitra_id"
                    id="requestmitra_id"
                    :value="old('requestmitra_id')"
                    required>
                    @foreach ($requestmitras as $requestmitra)
                        <option value="{{ $requestmitra->id }}">{{ $requestmitra->nama_usaha }}</option>
                    @endforeach                    
                </x-form.form-select>
                <x-form.form-error errorFor="requestmitra_id" />
            </div>
        
            <div>
                <x-form.form-label for="noTelp_usaha">
                    No. Telpon/WA usaha
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="noTelp_usaha"
                    id="noTelp_usaha"
                    :value="old('noTelp_usaha')"
                    placeholder="No. Telpon/WA usaha..."
                    required />
                <x-form.form-error errorFor="noTelp_usaha" />
            </div>

            <div>
                <x-form.form-label for="email_usaha">
                    Email usaha
                </x-form.form-label>
                <x-form.form-input
                    type="email"
                    name="email_usaha"
                    id="email_usaha"
                    :value="old('email_usaha')"
                    placeholder="Email usaha..."
                    required />
                <x-form.form-error errorFor="email_usaha" />
            </div>

            <div>
                <x-form.form-label for="alamat_usaha">
                    Alamat usaha
                </x-form.form-label>
                <x-form.form-textarea
                    type="text"
                    name="alamat_usaha"
                    id="alamat_usaha"
                    :value="old('alamat_usaha')"
                    placeholder="Alamat usaha..."
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="alamat_usaha" />
            </div>

            <div>
                <x-form.form-label for="harga01">
                    Harga 01 Rp.
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="harga01"
                    id="harga01"
                    step="0.01"
                    min="0"
                    :value="old('harga01')"
                    placeholder="999.999.999"
                    oninput="formatRupiah(this)"
                    required />
                <x-form.form-error errorFor="harga01" />
            </div>

            <div>
                <x-form.form-label for="ket_harga01">
                    Keterangan harga 01
                </x-form.form-label>
                <x-form.form-textarea
                    type="text"
                    name="ket_harga01"
                    id="ket_harga01"
                    :value="old('ket_harga01')"
                    placeholder="Keterangan harga 01..."
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="ket_harga01" />
            </div>

            <div>
                <x-form.form-label for="harga02">
                    Harga 02 Rp.
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="harga02"
                    id="harga02"
                    step="0.01"
                    min="0"
                    :value="old('harga02')"
                    placeholder="999.999.999"
                    oninput="formatRupiah(this)"
                    required />
                <x-form.form-error errorFor="harga02" />
            </div>

            <div>
                <x-form.form-label for="ket_harga02">
                    Keterangan harga 02
                </x-form.form-label>
                <x-form.form-textarea
                    type="text"
                    name="ket_harga02"
                    id="ket_harga02"
                    :value="old('ket_harga02')"
                    placeholder="Keterangan harga 02..."
                    required>
                </x-form.form-textarea>
                <x-form.form-error errorFor="ket_harga02" />
            </div>

            <div>
                <a href="{{ url('/customer/kerjasama') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>