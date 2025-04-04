<x-layout>

    <div>
        <div>
            @foreach ($paketPernikahans as $paketPernikahan)
                <div class="flex flex-row justify-center">
                    <h1>{{ $paketPernikahan->nama_paket }}</h1>
                </div>

                <div class="flex flex-row justify-between">
                    <div>
                        <h2>Venue</h2>
                        <h2>Dekorasi</h2>
                        <h2>Tata rias</h2>
                        <h2>Staff acara</h2>
                        <h2>Catering</h2>
                    </div>
                    <div>
                        <h2>{{ $paketPernikahan->venue }}</h2>
                        <h2>{{ $paketPernikahan->dekorasi }}</h2>
                        <h2>{{ $paketPernikahan->tata_rias }}</h2>
                        <h2>{{ $paketPernikahan->staff_acara }}</h2>
                        <h2>{{ $paketPernikahan->catering }}</h2>
                    </div>
                </div>

                <div class="flex flex-row justify-center">
                    <a href="{{ route('customer.pesanan.create', ['paketPernikahan' => $paketPernikahan->id]) }}">Pesan</a>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>