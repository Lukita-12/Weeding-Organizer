<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.bank.update', $bank->id) }}">
            @method('PUT')
        
            <div>
                <x-form.form-label for="nama_bank">
                    Nama bank
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_bank"
                    id="nama_bank"
                    value="{{ $bank->nama_bank }}"
                    placeholder="Nama bank..."
                    required />
                <x-form.form-error errorFor="nama_bank" />
            </div>

            <div>
                <x-form.form-label for="no_rekening">
                    No. rekening
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="no_rekening"
                    id="no_rekening"
                    value="{{ $bank->no_rekening }}"
                    placeholder="No. rekening..."
                    required />
                <x-form.form-error errorFor="no_rekening" />
            </div>

            <div>
                <a href="{{ url('/admin/bank') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>