<x-layout>

    <div>
        <a href="{{ route('admin.pesanan.create') }}">+ Baru</a>
        
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Tanggal pesanan</td>
                        <td>Pengantin pria</td>
                        <td>Pengantin wanita</td>
                        <td>Tanggal acara</td>
                        <td>Tanggal diskusi</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanans as $pesanan)
                        <tr>
                            <td>{{ $pesanan->tgl_pesanan }}</td>
                            <td>{{ $pesanan->pengantin_pria }}</td>
                            <td>{{ $pesanan->pengantin_wanita }}</td>
                            <td>{{ $pesanan->tanggal_acara }}</td>
                            <td>{{ $pesanan->tanggal_diskusi }}</td>
                            <td>
                                <a href="{{ route('admin.pesanan.edit', $pesanan->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.pesanan.destroy', $pesanan->id) }}">
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
            {{ $pesanans->links() }}
        </div>
    </div>

</x-layout>