<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::latest()->simplePaginate(6);

        return view('/admin.pelanggan.index', [
            'pelanggans' => $pelanggans
        ]);
    }

    public function create()
    {
        $users = User::where('role', 'customer')->latest()->get();

        return view('/admin.pelanggan.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'nama_pelanggan' => ['required'],
            'jk_pelanggan' => ['required', 'in:Laki-laki,Perempuan'],
            'noTelp_pelanggan' => ['required'],
            'email_pelanggan' => ['required', 'email'],
            'alamat_pelanggan' => ['required'],
        ]);

        Pelanggan::create([
            'user_id' => $request->input('user_id'),
            'nama_pelanggan' => $request->input('nama_pelanggan'),
            'jk_pelanggan' => $request->input('jk_pelanggan'),
            'noTelp_pelanggan' => $request->input('noTelp_pelanggan'),
            'email_pelanggan' => $request->input('email_pelanggan'),
            'alamat_pelanggan' => $request->input('alamat_pelanggan'),
        ]);

        return redirect('/admin/pelanggan');
    }

    public function show(Pelanggan $pelanggan)
    {
        //
    }

    public function edit(Pelanggan $pelanggan)
    {
        $users = User::where('role', 'customer')->latest()->get();

        return view('/admin.pelanggan.edit', [
            'pelanggan' => $pelanggan,
            'users' => $users,
        ]);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validatedData = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'nama_pelanggan' => ['required'],
            'jk_pelanggan' => ['required', 'in:Laki-laki,Perempuan'],
            'noTelp_pelanggan' => ['required'],
            'email_pelanggan' => ['required', 'email'],
            'alamat_pelanggan' => ['required'],
        ]);

        $pelanggan->update($validatedData);

        return redirect('/admin/pelanggan');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        
        return redirect('/admin/pelanggan');
    }
}
