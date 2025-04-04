<x-layout>

    <div>
        <a href="{{ route('admin.pembayaran.create') }}">+ Baru</a>
        
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Tanggal pembayaran</td>
                        <td>Bukti pembayaran</td>
                        <td>Bayar DP</td>
                        <td>Bayar Lunas</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayarans as $pembayaran)
                        <tr>
                            <td>{{ $pembayaran->tgl_pembayaran }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="Receipt" width="200">
                            </td>
                            <td>{{ $pembayaran->bayar_dp }}</td>
                            <td>{{ $pembayaran->bayar_lunas }}</td>
                            <td>
                                <a href="{{ route('admin.pembayaran.edit', $pembayaran->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.pembayaran.destroy', $pembayaran->id) }}">
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
            {{ $pembayarans->links() }}
        </div>
    </div>

</x-layout>