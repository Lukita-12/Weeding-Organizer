<x-layout>

    <div>

        <div>

        @guest
            <div>
                <a href="{{ url('/login') }}">LOGIN untuk membuat permintaan kerjasama!</a>
            </div>
        @endguest

        @auth
            <div>
                <a href="{{ route('customer.requestmitra.create') }}">
                    Buat kerjasama
                </a>
            </div>
        @endauth

        </div>

    </div>

</x-layout>