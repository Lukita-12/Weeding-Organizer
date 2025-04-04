<x-layout>

    <div>
        <a href="{{ route('admin.bank.create') }}">+ Baru</a>
        
        <div>
            <table>
                <thead>
                    <tr>
                        <td>Nama bank</td>
                        <td>No. rekening</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banks as $bank)
                        <tr>
                            <td>{{ $bank->nama_bank }}</td>
                            <td>{{ $bank->no_rekening }}</td>
                            <td>
                                <a href="{{ route('admin.bank.edit', $bank->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.bank.destroy', $bank->id) }}">
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
            {{ $banks->links() }}
        </div>
    </div>

</x-layout>