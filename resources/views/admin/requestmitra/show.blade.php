<x-layout>

    <div>
        <div>
            <h2>Informasi usaha</h2>
            <p><strong>Nama usaha:</strong> {{ $requestmitra->nama_usaha }}</p>
            <p><strong>Jenis usaha:</strong> {{ $requestmitra->jenis_usaha }}</p>
        </div>

        <div>
            <h2>Informasi pelanggan</h2>
            @if ($requestmitra->pelanggan)
                <p><strong>Nama:</strong> {{ $requestmitra->pelanggan->nama_pelanggan }}</p>
                <p><strong>Email:</strong> {{ $requestmitra->pelanggan->email_pelanggan }}</p>
            @else
                <p>Tidak ada data pelanggan yang ditemukan</p>
            @endif
        </div>

        <div>
            <a href="{{ route('admin.requestmitra.index') }}">Kembali</a>
        </div>
    </div>

</x-layout>