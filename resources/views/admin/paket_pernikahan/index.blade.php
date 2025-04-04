<x-layout>

    <div>
        <a href="{{ route('admin.paket_pernikahan.create') }}">+ Baru</a>
        
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Nama paket</td>
                        <td>Venue</td>
                        <td>Dekorasi</td>
                        <td>Tata rias</td>
                        <td>Staff acara</td>
                        <td>Catering</td>
                        <td>Kue pernikahan</td>
                        <td>Fotografer</td>
                        <td>Entertaimetn</td>
                        <td>Harga DP</td>
                        <td>Harga Lunas</td>
                        <td>Status paket</td>
                        
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paketPernikahans as $paketPernikahan)
                        <tr>
                            <td>{{ $paketPernikahan->nama_paket }}</td>
                            <td>{{ $paketPernikahan->venue }}</td>
                            <td>{{ $paketPernikahan->dekorasi }}</td>
                            <td>{{ $paketPernikahan->tata_rias }}</td>
                            <td>{{ $paketPernikahan->staff_acara }}</td>
                            <td>{{ $paketPernikahan->catering }}</td>
                            <td>{{ $paketPernikahan->kue_pernikahan }}</td>
                            <td>{{ $paketPernikahan->fotografer }}</td>
                            <td>{{ $paketPernikahan->entertaiment }}</td>
                            <td>{{ $paketPernikahan->hargaDP_paket }}</td>
                            <td>{{ $paketPernikahan->hargaLunas_paket }}</td>
                            <td>{{ $paketPernikahan->status_paket }}</td>
                            
                            <td>
                                <a href="{{ route('admin.paket_pernikahan.edit', $paketPernikahan->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.paket_pernikahan.destroy', $paketPernikahan->id) }}">
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
            {{ $paketPernikahans->links() }}
        </div>
    </div>

</x-layout>