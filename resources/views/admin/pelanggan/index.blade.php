<x-layout>

    <div>
        <a href="{{ route('admin.pelanggan.create') }}">+ Baru</a>
        
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Nama pelanggan</td>
                        <td>Jenis kelamin</td>
                        <td>No. Telpon/WA</td>
                        <td>Email</td>
                        <td>Alamat</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $pelanggan)
                        <tr>
                            <td>{{ $pelanggan->nama_pelanggan }}</td>
                            <td>{{ $pelanggan->jk_pelanggan }}</td>
                            <td>{{ $pelanggan->noTelp_pelanggan }}</td>
                            <td>{{ $pelanggan->email_pelanggan }}</td>
                            <td>{{ $pelanggan->alamat_pelanggan }}</td>
                            <td>
                                <a href="{{ route('admin.pelanggan.edit', $pelanggan->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.pelanggan.destroy', $pelanggan->id) }}">
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
            {{ $pelanggans->links() }}
        </div>
    </div>

</x-layout>