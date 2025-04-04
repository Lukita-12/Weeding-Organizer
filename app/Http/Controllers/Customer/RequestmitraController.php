<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Requestmitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestmitraController extends Controller
{
    public function index()
    {
        // by adding whereHas() to filter only records where the related pelanggan belongs to the logged-in user
        $requestmitras = Requestmitra::whereHas('pelanggan', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('pelanggan')->latest()->get();

        return view('/customer.requestmitra.index', [
            'requestmitras' => $requestmitras
        ]);
    }

    public function create()
    {
        $pelanggans = Pelanggan::where('user_id', Auth::id())->latest()->get();

        return view('/customer.requestmitra.create', [
            'pelanggans' => $pelanggans,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pelanggan_id' => ['required', 'exists:pelanggan,id'],
            'nama_usaha' => ['required'],
            'jenis_usaha' => ['required'],
            'nama_pemilik' => ['required'],

        ]);

        Requestmitra::create($validatedData);

        return redirect('/customer/requestmitra');
    }

    /**
     * Display the specified resource.
     */
    public function show(Requestmitra $requestmitra)
    {
        //
    }

    public function edit(Requestmitra $requestmitra)
    {
        $pelanggans = Pelanggan::where('user_id', Auth::id())->latest()->get();

        return view('/customer.requestmitra.edit', [
            'requestmitra' => $requestmitra,
            'pelanggans' => $pelanggans
        ]);
    }

    public function update(Request $request, Requestmitra $requestmitra)
    {
        $validatedData = $request->validate([
            'pelanggan_id' => ['required', 'exists:pelanggan,id'],
            'nama_usaha' => ['required'],
            'jenis_usaha' => ['required'],
            'nama_pemilik' => ['required'],
        ]);

        $requestmitra->update($validatedData);

        return redirect('/customer/requestmitra');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requestmitra $requestmitra)
    {
        $requestmitra->delete();

        return redirect('/customer/requestmitra');
    }
}
