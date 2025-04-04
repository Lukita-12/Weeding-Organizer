<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\PaketPernikahan;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('paketPernikahan')->where('user_id', Auth::id())->get();

        return view('/customer.pesanan.index', [
            'pesanans' => $pesanans,
        ]);
    }

    public function create(PaketPernikahan $paketPernikahan)
    {
        return view('/customer.pesanan.create', [
            'paketPernikahan' => $paketPernikahan,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paket_pernikahan_id'   => ['required', 'exists:paket_pernikahan,id'],
            'pengantin_pria'        => ['required'],
            'pengantin_wanita'      => ['required'],
            'tanggal_acara'         => ['required', 'date'],
            'tanggal_diskusi'       => ['required', 'date'],
        ]);

        // Add user_id to the validated data
        $validatedData['user_id'] = Auth::id();

        // Add 'tgl_pesanan' manually to the validated data
        $validatedData['tgl_pesanan'] = Carbon::now();

        Pesanan::create($validatedData);

        return redirect('/customer/pesanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        dd('You hit it right Show!');
    }

    public function edit(Pesanan $pesanan)
    {
        //
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        
        return redirect('/customer/pesanan');
    }
}
