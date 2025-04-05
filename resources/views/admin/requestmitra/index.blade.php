<x-layout>

    <div>
        <a href="{{ route('admin.requestmitra.create') }}">+ Baru</a>
        
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Nama pelanggan</td>
                        <td>Nama usaha</td>
                        <td>Jenis usaha</td>
                        <td>Pemilik usaha</td>
                        <td>Status permintaan</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requestmitras as $requestmitra)
                        <tr>
                            <td>{{ $requestmitra->pelanggan->nama_pelanggan }}</td>
                            <td>{{ $requestmitra->nama_usaha }}</td>
                            <td>{{ $requestmitra->jenis_usaha }}</td>
                            <td>{{ $requestmitra->nama_pemilik }}</td>
                            <td>{{ $requestmitra->status_request }}</td>
                            <td>
                                <div>
                                    @if ($requestmitra->status_request !== 'Diterima')
                                        <form method="POST" action="{{ route('admin.requestmitra.accept', $requestmitra->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit">Terima</button>
                                        </form>
                                    @endif

                                    @if ($requestmitra->status_request !== 'Ditolak')
                                        <form method="POST" action="{{ route('admin.requestmitra.reject', $requestmitra->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit">Tolak</button>
                                        </form>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ route('admin.requestmitra.edit', $requestmitra->id) }}">Edit</a>
                                    <form method="POST" action="{{ route('admin.requestmitra.destroy', $requestmitra->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            {{ $requestmitras->links() }}
        </div>
    </div>

</x-layout>