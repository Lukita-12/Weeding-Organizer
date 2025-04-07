<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\Pelanggan;
use App\Models\Requestmitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestmitraController extends Controller
{
    public function index(Request $request)
    {
        $query = Requestmitra::with('pelanggan');

        // Filter
        if ($request->filled('status_request')) {
            $query->where('status_request', $request->status_request);
        }

        // Sorting
        $sortBy     = $request->input('sort_by', 'created_at');
        $sortOrder  = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Search
        if ($request->filled('search_request')) {
            $searchRequest = $request->search_request;

            $query->where(function ($q) use ($searchRequest) {
                $q->where('nama_usaha', 'like', "%{$searchRequest}%")
                  ->orWhereHas('pelanggan', function ($q2) use ($searchRequest) {
                    $q2->where('nama_pelanggan', 'like', "%{$searchRequest}");
                  });
            });
        }
        
        $requestmitras = $query->paginate(6)->withQueryString();
        
        return view('/admin.requestmitra.index', [
            'requestmitras' => $requestmitras,
            'sortBy'        => $sortBy,
            'sortOrder'     => $sortOrder
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
        // Eager load customer relationship just in case
        $requestmitra->load('pelanggan');

        return view('/admin.requestmitra.show', [
            'requestmitra' => $requestmitra,
        ]);
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

    public function accept(Requestmitra $requestmitra)
    {
        DB::transaction(function () use ($requestmitra) {
            // 1. Update status            
            $requestmitra->update(['status_request' => 'Diterima']);

            // 2. Create new kerjasama
            Kerjasama::create([
            'requestmitra_id'   => $requestmitra->id,
            'pelanggan_id'      => $requestmitra->pelanggan_id,
            'nama_pemilik'      => $requestmitra->nama_pemilik,
            'nama_usaha'        => $requestmitra->nama_usaha,
            'jenis_usaha'       => $requestmitra->jenis_usaha,
            // leave it null for now
            'noTelp_usaha'      => null,
            'email_usaha'       => null,
            'alamat_usaha'      => null,
            'harga01'           => null,
            'ket_harga01'       => null,
            'harga02'           => null,
            'ket_harga02'       => null,
            ]);
        });

        return redirect('/admin/requestmitra')->with('sukses', 'Permintaan kerjasama telah diterima');
    }

    public function reject(Requestmitra $requestmitra)
    {
        $requestmitra->status_request = 'Ditolak';
        $requestmitra->save();

        return redirect('/admin/requestmitra');
    }
}
