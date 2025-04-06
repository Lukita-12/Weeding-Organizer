<x-layout>

    <div>
        <h1>Permintaan kerjasama</h1>
        @if (session('sukses'))
            <div>
                {{ session('sukses') }}
            </div>
        @endif
    </div>

    <div>
        <div>
            <a href="{{ route('admin.requestmitra.create') }}">+ Baru</a>
            <form method="GET" action="{{ route('admin.requestmitra.index') }}">
                <label for="status_request">Filter status:</label>
                <select name="status_request" id="status_request"
                    onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <option value="Ditunggu" @selected(request('status_request') === 'Ditunggu')>Ditunggu</option>
                    <option value="Diterima" @selected(request('status_request') === 'Diterima')>Diterima</option>
                    <option value="Ditolak" @selected(request('status_request') === 'Ditolak')>Ditolak</option>
                </select>
            </form>

            <form method="GET" action="{{ route('admin.requestmitra.index') }}">
                <input type="text"
                    name="search_request"
                    value="{{ request('search_request') }}" placeholder="Search..."
                    class="" />
                    <button type="submit">Cari</button>
            </form>
        </div>
        
        <div>
            <table>
                @php
                    function sortLink($column, $label, $currentSortBy, $currentSortOrder) {
                        $newOrder = ($currentSortBy === $column && $currentSortOrder === 'asc') ? 'desc' : 'asc';
                        $query = array_merge(request()->query(), ['sort_by' => $column, 'sort_order' => $newOrder]);
                        return '<a href="' . route('admin.requestmitra.index', $query) . '" class="underline">' . $label . '</a>';
                    }
                @endphp
                <thead>
                    <tr>
                        <th>{!! sortLink('nama_usaha', 'Nama Usaha', $sortBy, $sortOrder) !!}</th>
                        <th>{!! sortLink('jenis_usaha', 'Jenis usaha', $sortBy, $sortOrder) !!}</th>
                        <th>{!! sortLink('nama_pemilik', 'Nama pemilik', $sortBy, $sortOrder) !!}</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requestmitras as $requestmitra)
                        <tr>
                            <td>{{ $requestmitra->nama_usaha }}</td>
                            <td>{{ $requestmitra->jenis_usaha }}</td>
                            <td>{{ $requestmitra->nama_pemilik }}</td>
                            <td>{{ $requestmitra->status_request }}</td>
                            <td>
                                <div>
                                    @if ($requestmitra->status_request !== 'Diterima')
                                        <form method="POST" action="{{ route('admin.requestmitra.accept', $requestmitra->id) }}" onsubmit="return confirm('Apakah anda yakin untuk menerima permintaan kerjasama?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit">Terima</button>
                                        </form>
                                    @endif

                                    @if ($requestmitra->status_request !== 'Ditolak')
                                        <form method="POST" action="{{ route('admin.requestmitra.reject', $requestmitra->id) }}" onsubmit="return confirm('Apakah anda yakin untuk menolak permintaan kerjasama?')">
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