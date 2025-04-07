<x-layout>

    <div>
        <a href="{{ route('admin.kerjasama.create') }}">+ Baru</a>
        
        <div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>No. Telpon/WA usaha</td>
                        <td>Email usaha</td>
                        <td>Alamat usaha</td>
                        <td>Harga 01</td>
                        <td>Keterangan harga 01</td>
                        <td>Harga 02</td>
                        <td>Keterangan harga 02</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kerjasamas as $kerjasama)
                        <tr>
                            <td>{{ $kerjasama->noTelp_usaha }}</td>
                            <td>{{ $kerjasama->email_usaha }}</td>
                            <td>{{ $kerjasama->alamat_usaha }}</td>
                            <td>{{ $kerjasama->harga01 }}</td>
                            <td>{{ $kerjasama->ket_harga01 }}</td>
                            <td>{{ $kerjasama->harga02 }}</td>
                            <td>{{ $kerjasama->ket_harga02 }}</td>
                            <td>
                                <a href="{{ route('admin.kerjasama.edit', $kerjasama->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.kerjasama.destroy', $kerjasama->id) }}">
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
            {{ $kerjasamas->links() }}
        </div>
    </div>

</x-layout>