<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        dd('Hi there!');
    }

    public function create(Pesanan $pesanan)
    {
        return view('/customer.pembayaran.create', [
            'pesanan' => $pesanan
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pesanan_id'        => ['required', 'exists:pesanan,id'],
            'bukti_pembayaran'  => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'],
            'bayar_dp'          => ['required'],
            'bayar_lunas'       => ['nullable'],
        ]);

        $validatedData['user_id'] = Auth::id();

        // Use Carbon for date_payment (default to current date if empty)
        $validatedData['tgl_pembayaran'] = Carbon::now();

        // Handle file upload
        $imagePath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        // Add image path to validated data
        $validatedData['bukti_pembayaran'] = $imagePath;

        // Default value for bayar_lunas
        $validatedData['bayar_lunas'] = 'Belum dibayar' ;

        Pembayaran::create($validatedData);

        return redirect('/customer/pembayaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    public function edit(Pembayaran $pembayaran)
    {
        dd('Hi there!');
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        dd('Hi there!');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        dd('Hi there!');
    }
}
