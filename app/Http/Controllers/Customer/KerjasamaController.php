<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KerjasamaController extends Controller
{    
    use AuthorizesRequests;
    
    public function index()
    {
        $kerjasamas = Kerjasama::where('pelanggan_id',
            Auth::user()->pelanggan->pluck('id'))
            ->latest()->paginate(8);

        return view('/customer.kerjasama.index', [
            'kerjasamas' => $kerjasamas,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kerjasama $kerjasama)
    {
        dd('You hit right Show!');
    }

    public function edit(Kerjasama $kerjasama)
    {
        $this->authorize('update', $kerjasama); // ensure only the owner can edit

        return view('/customer.kerjasama.edit', [
            'kerjasama' => $kerjasama,
        ]);
    }

    public function update(Request $request, Kerjasama $kerjasama)
    {
        $validatedData = $request->validate([
            'pelanggan_id' => ['required', 'exists:pelanggan,id'],
            'requestmitra_id' => ['required', 'exists:requestmitra,id'],
            'noTelp_usaha' => ['required'],
            'email_usaha' => ['required', 'email', 'max:254'],
            'alamat_usaha' => ['required'],
            'harga01' => ['required', 'string'],
            'ket_harga01' => ['required'],
            'harga02' => ['required', 'string'],
            'ket_harga02' => ['required'],
        ]);

        // Remove thousand separators (dots) and convert comma to decimal point
        $validatedData['harga01'] = str_replace(['.', ','], ['', '.'], $validatedData['harga01']);
        $validatedData['harga02'] = str_replace(['.', ','], ['', '.'], $validatedData['harga02']);
    
        // Convert to proper decimal format
        $validatedData['harga01'] = number_format((float) $validatedData['harga01'], 2, '.', '');
        $validatedData['harga02'] = number_format((float) $validatedData['harga02'], 2, '.', '');

        $kerjasama->update($validatedData);

        return redirect('/customer/kerjasama');
    }

    public function destroy(Kerjasama $kerjasama)
    {
        $kerjasama->delete();
        
        return redirect('/admin/kerjasama');
    }
}
