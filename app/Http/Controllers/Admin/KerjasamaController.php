<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\Pelanggan;
use App\Models\Requestmitra;
use Illuminate\Http\Request;

class KerjasamaController extends Controller
{
    public function index()
    {
        $kerjasamas = Kerjasama::latest()->paginate(8);

        return view('/admin.kerjasama.index', [
            'kerjasamas' => $kerjasamas,
        ]);
    }

    public function create()
    {
        $pelanggans = Pelanggan::latest()->get();
        $requestmitras = Requestmitra::latest()->get();

        return view('/admin.kerjasama.create', [
            'pelanggans' => $pelanggans,
            'requestmitras' =>  $requestmitras,
        ]);
    }

    public function store(Request $request)
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

        Kerjasama::create($validatedData);

        return redirect('/admin/kerjasama');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kerjasama $kerjasama)
    {
        dd('You hit it right Show!');
    }

    public function edit(Kerjasama $kerjasama)
    {
        $pelanggans = Pelanggan::latest()->get();
        $requestmitras = Requestmitra::latest()->get();

        return view('/admin.kerjasama.edit', [
            'kerjasama' => $kerjasama,
            'pelanggans' => $pelanggans,
            'requestmitras' =>  $requestmitras,
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

        return redirect('/admin/kerjasama');
    }

    public function destroy(Kerjasama $kerjasama)
    {
        $kerjasama->delete();
        
        return redirect('/admin/kerjasama');
    }
}
