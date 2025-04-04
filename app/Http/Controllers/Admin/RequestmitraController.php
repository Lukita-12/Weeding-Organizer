<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Requestmitra;
use Illuminate\Http\Request;

class RequestmitraController extends Controller
{
    public function index()
    {
        $requestmitras = Requestmitra::latest()->paginate(6);
        
        return view('/admin.requestmitra.index', [
            'requestmitras' => $requestmitras
        ]);
    }

    public function create()
    {
        $pelanggans = Pelanggan::latest()->get();

        return view('/admin.requestmitra.create', [
            'pelanggans' => $pelanggans
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

        return redirect('/admin/requestmitra');
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
        return view('/admin.requestmitra.edit', [
            'requestmitra' => $requestmitra,
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

        return redirect('/admin/requestmitra');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requestmitra $requestmitra)
    {
        $requestmitra->delete();

        return redirect('/admin/requestmitra');
    }
}
