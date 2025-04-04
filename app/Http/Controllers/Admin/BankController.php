<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::latest()->paginate(8);

        return view('/admin.bank.index', [
            'banks' => $banks,
        ]);
    }

    public function create()
    {
        return view('/admin.bank.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bank'     => ['required'],
            'no_rekening'   => ['required'],
        ]);

        Bank::create($validatedData);

        return redirect('/admin/bank');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    public function edit(Bank $bank)
    {
        return view('/admin.bank.edit', [
            'bank' => $bank,
        ]);
    }

    public function update(Request $request, Bank $bank)
    {
        $validatedData = $request->validate([
            'nama_bank'     => ['required'],
            'no_rekening'   => ['required'],
        ]);

        $bank->update($validatedData);

        return redirect('/admin/bank');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect('/admin/bank');
    }
}
