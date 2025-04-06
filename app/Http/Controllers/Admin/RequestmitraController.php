<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Requestmitra;
use Illuminate\Http\Request;

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

    public function accept(Requestmitra $requestmitra)
    {
        $requestmitra->status_request = 'Diterima';
        $requestmitra->save();

        return redirect('/admin/requestmitra')->with('sukses', 'Permintaan kerjasama telah diterima');
    }

    public function reject(Requestmitra $requestmitra)
    {
        $requestmitra->status_request = 'Ditolak';
        $requestmitra->save();

        return redirect('/admin/requestmitra');
    }
}
