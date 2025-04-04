<x-layout>

    <div>
        @if ($pesanans->isEmpty())
            <div>
                <h1>Tidak ada pesanan.</h1>
            </div>
        @else
            <div>
                <table>
                    <thead>
                        <tr>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanans as $pesanan)
                            <tr>
                                <td>{{ $pesanan->paketPernikahan->nama_paket }}</td>
                                <td>{{ $pesanan->tgl_pesanan }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('customer.pembayaran.create', $pesanan->id) }}">Bayar pesanan</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</x-layout>