<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        // Filters the pelanggans table to only include records where user_id matches the logged-in user's ID(There a user_id field inside table pelanggan).
        $pelanggans = Pelanggan::where('user_id', Auth::id())
            ->latest()->get();

        return view('/customer.pelanggan.index', [
            'pelanggans' => $pelanggans
        ]);
    }

    public function create()
    {
        return view('/customer.pelanggan.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama_pelanggan'    => ['required'],
            'jk_pelanggan'      => ['required', 'in:Laki-laki,Perempuan'],
            'noTelp_pelanggan'  => ['required'],
            'email_pelanggan'   => ['required', 'email'],
            'alamat_pelanggan'  => ['required'],
        ]);

        Pelanggan::create([
            'user_id'           => $user->id,
            'nama_pelanggan'    => $request->input('nama_pelanggan'),
            'jk_pelanggan'      => $request->input('jk_pelanggan'),
            'noTelp_pelanggan'  => $request->input('noTelp_pelanggan'),
            'email_pelanggan'   => $request->input('email_pelanggan'),
            'alamat_pelanggan'  => $request->input('alamat_pelanggan'),
        ]);

        return redirect('/customer/pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    public function edit(Pelanggan $pelanggan)
    {
        $this->authorize('update', $pelanggan);

        return view('/customer.pelanggan.edit', [
            'pelanggan' => $pelanggan
        ]);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $this->authorize('update', $pelanggan);

        $validatedData = $request->validate([
            'nama_pelanggan'    => ['required'],
            'jk_pelanggan'      => ['required', 'in:Laki-laki,Perempuan'],
            'noTelp_pelanggan'  => ['required'],
            'email_pelanggan'   => ['required', 'email'],
            'alamat_pelanggan'  => ['required'],
        ]);

        $authData = array_merge($validatedData, ['user_id' => Auth::id()]);

        $pelanggan->update($authData);

        return redirect('/customer/pelanggan');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $this->authorize('delete', $pelanggan);

        $pelanggan->delete();

        return redirect('/customer/pelanggan');
    }
}
