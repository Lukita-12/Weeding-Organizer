<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::latest()->paginate(8);

        return view('/admin.pesanan.index', [
            'pesanans' => $pesanans,
        ]);
    }

    public function create()
    {
        return view('/admin.pesanan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_pesanan'       => ['required', 'date'],
            'pengantin_pria'    => ['required'],
            'pengantin_wanita'  => ['required'],
            'tanggal_acara'     => ['required', 'date'],
            'tanggal_diskusi'   => ['required', 'date'],
        ]);

        Pesanan::create($validatedData);

        return redirect('/admin/pesanan');
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
        return view('/admin.pesanan.edit', [
            'pesanan' => $pesanan,
        ]);
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $validatedData = $request->validate([
            'tgl_pesanan'       => ['required', 'date'],
            'pengantin_pria'    => ['required'],
            'pengantin_wanita'  => ['required'],
            'tanggal_acara'     => ['required', 'date'],
            'tanggal_diskusi'   => ['required', 'date'],
        ]);

        $pesanan->update($validatedData);

        return redirect('/admin/pesanan');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        
        return redirect('/admin/pesanan');
    }
}
