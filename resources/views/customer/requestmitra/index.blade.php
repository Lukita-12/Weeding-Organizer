<x-layout>

    <div>

        <div>

        @guest
            <div>
                <a href="{{ url('/login') }}">LOGIN untuk membuat permintaan kerjasama!</a>
            </div>
        @endguest

        @auth
            <a href="{{ route('customer.requestmitra.create') }}">+ Baru</a>
            
            <div>
                <table>
                    <thead>
                        <tr>
                            <td>Nama pelanggan</td>
                            <td>Nama usaha</td>
                            <td>Jenis usaha</td>
                            <td>Pemilik usaha</td>
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
                                <td>
                                    <a href="{{ route('customer.requestmitra.edit', $requestmitra->id) }}">Edit</a>
                                    <form method="POST" action="{{ route('customer.requestmitra.destroy', $requestmitra->id) }}">
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
        @endauth

        </div>

    </div>

</x-layout>