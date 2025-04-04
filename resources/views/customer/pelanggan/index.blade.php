<x-layout>

    <div>

        <a href="{{ route('customer.pelanggan.create') }}">+ Baru</a>
        
        <div class="">
            @foreach ($pelanggans as $pelanggan)
                <div class="flex flex-row">
                    <div class="flex flex-col w-full">
                        <p>Nama lengkap: {{ $pelanggan->nama_pelanggan }}</p>
                        <p>Jenis kelamin: {{ $pelanggan->jk_pelanggan }}</p>
                        <p>No. Telpon/WA: {{ $pelanggan->noTelp_pelanggan }}</p>
                    </div>
                    <div class="flex flex-col w-full">
                        <p>Email: {{ $pelanggan->email_pelanggan }}</p>
                        <p>Alamat: {{ $pelanggan->alamat_pelanggan }}</p>
                    </div>
                </div>
                <div class="flex flex-row gap-2 items-center">
                    <a href="{{ route('customer.pelanggan.edit', $pelanggan->id) }}">Edit</a>
                    <form method="POST" action="{{ route('customer.pelanggan.destroy', $pelanggan->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </div>
            @endforeach
        </div>

    </div>

</x-layout>