<x-layout>

    <div>
        <a href="{{ route('admin.requestmitra.create') }}">+ Baru</a>
        
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Nama usaha</td>
                        <td>Jenis usaha</td>
                        <td>Pemilik usaha</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requestmitras as $requestmitra)
                        <tr>
                            <td>{{ $requestmitra->nama_usaha }}</td>
                            <td>{{ $requestmitra->jenis_usaha }}</td>
                            <td>{{ $requestmitra->nama_pemilik }}</td>
                            <td>
                                <a href="{{ route('admin.requestmitra.edit', $requestmitra->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.requestmitra.destroy', $requestmitra->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
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