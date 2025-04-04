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
        return view('/customer.requestmitra.index');
    }

    public function create()
    {
        $user       = Auth::user();
        $customer   = $user->pelanggan;
        
        // Determine if the user has customer data
        $hasCustomer = $customer !==null;

        return view('/customer.requestmitra.create', [
            'hasCustomer' => $hasCustomer,
        ]);
    }

    public function store(Request $request)
    {
        $user       = Auth::user();
        $customer   = $user->pelanggan;

        // Double-check the user has a customer profile
        if (!$customer) {
            return redirect()->route('customer.pelanggan.create')->with('error', 'Buat informasi customer terlebih dahulu.');
        }

        $request->validate([
            'nama_usaha'    => ['required'],
            'jenis_usaha'   => ['required'],
            'nama_pemilik'  => ['required'],

        ]);

        Requestmitra::create([
            'pelanggan_id'  => $customer->id,
            'nama_usaha'    => $request->input('nama_usaha'),
            'jenis_usaha'   => $request->input('jenis_usaha'),
            'nama_pemilik'  => $request->input('nama_pemilik'),
        ]);

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
