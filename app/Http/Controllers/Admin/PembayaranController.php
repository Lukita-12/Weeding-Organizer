<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::latest()->paginate(8);

        return view('/admin.pembayaran.index', [
            'pembayarans' => $pembayarans,
        ]);
    }

    public function create()
    {
        return view('/admin.pembayaran.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_pembayaran'    => ['nullable', 'date'],
            'bukti_pembayaran'  => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'],
            'bayar_dp'          => ['required'],
            'bayar_lunas'       => ['required'],
        ]);

        // Handle file upload
        $imagePath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        // Use Carbon for date_payment (default to current date if empty)
        $validatedData['tgl_pembayaran'] = $request->tgl_pembayaran ? Carbon::parse($request->tgl_pembayaran) : Carbon::now();

        // Add image path to validated data
        $validatedData['bukti_pembayaran'] = $imagePath;
        
        Pembayaran::create($validatedData);

        return redirect('/admin/pembayaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('/admin.pembayaran.edit', [
            'pembayaran' => $pembayaran,
        ]);
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'tgl_pembayaran'    => ['nullable', 'date'],
            'bukti_pembayaran'  => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'],
            'bayar_dp'          => ['required'],
            'bayar_lunas'       => ['required'],
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            // Delete old image if exists
            if ($pembayaran->bukti_pembayaran) {
                Storage::delete('public/' . $pembayaran->bukti_pembayaran);
            }
    
            // Store new image
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        } else {
            // Keep the old image
            $validatedData['bukti_pembayaran'] = $pembayaran->bukti_pembayaran;
        }

        // Prevent `date_payment` from being updated
        // $validatedData['date_payment'] = $payment->date_payment;

        $pembayaran->update($validatedData);

        return redirect('/admin/pembayaran');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        // Check if the payment has an image and delete it from storage
        if ($pembayaran->bukti_pembayaran) {
            Storage::delete('public/' . $pembayaran->bukti_pembayaran);
        }

        $pembayaran->delete();

        return redirect('/admin/pembayaran');
    }
}
