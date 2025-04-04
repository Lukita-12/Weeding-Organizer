<x-layout>

    <div>
        <x-form.form-layout action="{{ route('admin.pelanggan.update', $pelanggan->id) }}">
            @method('PUT')

            <div>
                <x-form.form-label for="user_id">
                    User
                </x-form.form-label>
                <x-form.form-select
                    name="user_id"
                    id="user_id"
                    required>
                    <option value="{{ $pelanggan->user->id }}">{{ $pelanggan->user->name }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" user-email=" {{ $user->email }}">{{ $user->name }}</option>
                    @endforeach
                </x-form.form-select>
                <x-form.form-error errorFor="user_id" />
            </div>

            <div>
                <x-form.form-label for="nama_lengkap">
                    Nama lengkap
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="nama_pelanggan"
                    id="nama_pelanggan"
                    value="{{ $pelanggan->nama_pelanggan }}"
                    placeholder="Nama lengkap..."
                    required />
                <x-form.form-error errorFor="nama_pelanggan" />
            </div>

            <div>
                <x-form.form-label for="jk_pelanggan">
                    Jenis kelamin
                </x-form.form-label>
                <x-form.form-select
                    name="jk_pelanggan"
                    id="jk_pelanggan"
                    placeholder="Nama lengkap..."
                    required>
                    <option value="{{ $pelanggan->jk_pelanggan }}">{{ $pelanggan->jk_pelanggan }}</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </x-form.form-select>
                <x-form.form-error errorFor="jk_pelanggan" />
            </div>

            <div>
                <x-form.form-label for="noTelp_pelanggan">
                    No. Telpon/WA
                </x-form.form-label>
                <x-form.form-input
                    type="text"
                    name="noTelp_pelanggan"
                    id="noTelp_pelanggan"
                    value="{{ $pelanggan->noTelp_pelanggan }}"
                    placeholder="No. Telpon/WA..."
                    required />
                <x-form.form-error errorFor="noTelp_pelanggan" />
            </div>

            <div>
                <x-form.form-label for="email_pelanggan">
                    Email
                </x-form.form-label>
                <x-form.form-input
                    type="email"
                    name="email_pelanggan"
                    id="email_pelanggan"
                    value="{{ $pelanggan->email_pelanggan }}"
                    placeholder="Email..."
                    required />
                <x-form.form-error errorFor="email_pelanggan" />
            </div>

            <div>
                <x-form.form-label for="alamat_pelanggan">
                    Alamat
                </x-form.form-label>
                <x-form.form-textarea
                    type="text"
                    name="alamat_pelanggan"
                    id="alamat_pelanggan"
                    placeholder="Alamat..."
                    required>
                    {{ $pelanggan->alamat_pelanggan }}
                </x-form.form-textarea>
                <x-form.form-error errorFor="alamat_pelanggan" />
            </div>

            <div>
                <a href="{{ url('/admin/pelanggan') }}">Batal</a>
                <button type="submit">Simpan</button>
            </div>

        </x-form.form-layout>
    </div>

</x-layout>