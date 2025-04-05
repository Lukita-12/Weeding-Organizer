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
        $customers   = $user->pelanggan;
        
        // Determine if the user has customer data
        $hasCustomer = $customers->isNotEmpty();

        return view('/customer.requestmitra.create', [
            'hasCustomer' => $hasCustomer,
            'customers'     => $customers
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'pelanggan_id'  => ['required', 'exists:pelanggan,id'],
            'nama_usaha'    => ['required', 'string', 'max:254'],
            'jenis_usaha'   => ['required'],
            'nama_pemilik'  => ['required'],
        ]);

        $customer = $user->pelanggan->where('id', $validatedData['pelanggan_id'])->first();
        if (!$customer) {
            return redirect()->back()->withErrors([
                'pelanggan_id' => 'Informasi pelanggan yang dipilih bukan milik anda!',
            ]);
        }

        Requestmitra::create([
            'pelanggan_id'  => $validatedData['pelanggan_id'],
            'nama_usaha'    => $validatedData['nama_usaha'],
            'jenis_usaha'   => $validatedData['jenis_usaha'],
            'nama_pemilik'  => $validatedData['nama_pemilik'],
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
