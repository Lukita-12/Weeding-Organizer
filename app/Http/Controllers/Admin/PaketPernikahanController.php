<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use App\Models\PaketPernikahan;
use Illuminate\Http\Request;

class PaketPernikahanController extends Controller
{
    public function index()
    {
        $paketPernikahans = PaketPernikahan::with('kerjasama')->latest()->paginate(6);

        return view('/admin.paket_pernikahan.index', [
            'paketPernikahans' => $paketPernikahans,
        ]);
    }

    public function create()
    {
        $kerjasamas = Kerjasama::with('requestmitra')->latest()->get();

        return view('/admin.paket_pernikahan.create', [
            'kerjasamas' => $kerjasamas,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_paket'        => ['required'],
            'venue'             => ['nullable', 'exists:kerjasama,id'],
            'dekorasi'          => ['nullable', 'exists:kerjasama,id'],
            'tata_rias'         => ['nullable', 'exists:kerjasama,id'],
            'staff_acara'       => ['nullable'],
            'catering'          => ['nullable', 'exists:kerjasama,id'],
            'kue_pernikahan'    => ['nullable'],
            'fotografer'        => ['nullable'],
            'entertaiment'      => ['nullable'],
            'hargaDP_paket'     => ['required', 'string'],
            'hargaLunas_paket'  => ['required', 'string'],
            'status_paket'      => ['required'],
        ]);

        // Get full names only if a person is selected
        $venue          = $validatedData['venue']           ? Kerjasama::find($validatedData['venue'])->requestmitra->nama_usaha : null;
        $dekorasi       = $validatedData['dekorasi']        ? Kerjasama::find($validatedData['dekorasi'])->requestmitra->nama_usaha : null;
        $tata_rias      = $validatedData['tata_rias']       ? Kerjasama::find($validatedData['tata_rias'])->requestmitra->nama_usaha : null;
        $catering       = $validatedData['catering']        ? Kerjasama::find($validatedData['catering'])->requestmitra->nama_usaha : null;
        $kue_pernikahan = $validatedData['kue_pernikahan']  ? Kerjasama::find($validatedData['kue_pernikahan'])->requestmitra->nama_usaha : null;
        $fotografer     = $validatedData['fotografer']      ? Kerjasama::find($validatedData['fotografer'])->requestmitra->nama_usaha : null;
        $entertaiment   = $validatedData['entertaiment']    ? Kerjasama::find($validatedData['entertaiment'])->requestmitra->nama_usaha : null;

        // Remove thousand separators (dots) and convert comma to decimal point
        $validatedData['hargaDP_paket']     = str_replace(['.', ','], ['', '.'], $validatedData['hargaDP_paket']);
        $validatedData['hargaLunas_paket']  = str_replace(['.', ','], ['', '.'], $validatedData['hargaLunas_paket']);

        // Convert to proper decimal format
        $validatedData['hargaDP_paket']     = number_format((float) $validatedData['hargaDP_paket'], 2, '.', '');
        $validatedData['hargaLunas_paket']  = number_format((float) $validatedData['hargaLunas_paket'], 2, '.', '');

        // Create domain with resident names
        $paket = PaketPernikahan::create([
            'nama_paket'        => $validatedData['nama_paket'],
            'venue'             => $venue,
            'dekorasi'          => $dekorasi,
            'tata_rias'         => $tata_rias,
            'staff_acara'       => $validatedData['staff_acara'],
            'catering'          => $catering,
            'kue_pernikahan'    => $kue_pernikahan,
            'fotografer'        => $fotografer,
            'entertaiment'      => $entertaiment,
            'hargaDP_paket'     => $validatedData['hargaDP_paket'],
            'hargaLunas_paket'  => $validatedData['hargaLunas_paket'],
            'status_paket'      => $validatedData['status_paket'],
        ]);

        // Attach only non-null people to pivot table
        $kerjasamaToAttach = [];
        if ($validatedData['venue']) {
            $kerjasamaToAttach[] = $validatedData['venue'];
        }
        if ($validatedData['dekorasi']) {
            $kerjasamaToAttach[] = $validatedData['dekorasi'];
        }
        if ($validatedData['tata_rias']) {
            $kerjasamaToAttach[] = $validatedData['tata_rias'];
        }
        if ($validatedData['catering']) {
            $kerjasamaToAttach[] = $validatedData['catering'];
        }
        if ($validatedData['kue_pernikahan']) {
            $kerjasamaToAttach[] = $validatedData['kue_pernikahan'];
        }
        if ($validatedData['fotografer']) {
            $kerjasamaToAttach[] = $validatedData['fotografer'];
        }
        if ($validatedData['entertaiment']) {
            $kerjasamaToAttach[] = $validatedData['entertaiment'];
        }
    
        if (!empty($kerjasamaToAttach)) {
            $paket->kerjasama()->attach($kerjasamaToAttach);
        }

        return redirect('/admin/paket-pernikahan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketPernikahan $paketPernikahan)
    {
        dd('You hit it right Show!');
    }

    public function edit(PaketPernikahan $paketPernikahan)
    {
        $kerjasamas = Kerjasama::with('requestmitra')->latest()->get();

        // Find the associated people IDs
        $selectedKerjasama = $paketPernikahan->kerjasama->pluck('id')->toArray();

        return view('/admin.paket_pernikahan.edit', [
            'paketPernikahan'   => $paketPernikahan,
            'kerjasamas'        => $kerjasamas,
            'selectedKerjasama' => $selectedKerjasama,
        ]);
    }

    public function update(Request $request, PaketPernikahan $paketPernikahan)
    {
        $validatedData = $request->validate([
            'nama_paket'        => ['required'],
            'venue'             => ['nullable', 'exists:kerjasama,id'],
            'dekorasi'          => ['nullable', 'exists:kerjasama,id'],
            'tata_rias'         => ['nullable', 'exists:kerjasama,id'],
            'staff_acara'       => ['nullable'],
            'catering'          => ['nullable', 'exists:kerjasama,id'],
            'kue_pernikahan'    => ['nullable'],
            'fotografer'        => ['nullable'],
            'entertaiment'      => ['nullable'],
            'hargaDP_paket'     => ['required', 'string'],
            'hargaLunas_paket'  => ['required', 'string'],
            'status_paket'      => ['required'],
        ]);

        // Get full names only if selected
        $venue          = $validatedData['venue']           ? Kerjasama::find($validatedData['venue'])->requestmitra->nama_usaha : null;
        $dekorasi       = $validatedData['dekorasi']        ? Kerjasama::find($validatedData['dekorasi'])->requestmitra->nama_usaha : null;
        $tata_rias      = $validatedData['tata_rias']       ? Kerjasama::find($validatedData['tata_rias'])->requestmitra->nama_usaha : null;
        $catering       = $validatedData['catering']        ? Kerjasama::find($validatedData['catering'])->requestmitra->nama_usaha : null;
        $kue_pernikahan = $validatedData['kue_pernikahan']  ? Kerjasama::find($validatedData['kue_pernikahan'])->requestmitra->nama_usaha : null;
        $fotografer     = $validatedData['fotografer']      ? Kerjasama::find($validatedData['fotografer'])->requestmitra->nama_usaha : null;
        $entertaiment   = $validatedData['entertaiment']    ? Kerjasama::find($validatedData['entertaiment'])->requestmitra->nama_usaha : null;

        // Remove thousand separators (dots) and convert comma to decimal point
        $validatedData['hargaDP_paket']     = str_replace(['.', ','], ['', '.'], $validatedData['hargaDP_paket']);
        $validatedData['hargaLunas_paket']  = str_replace(['.', ','], ['', '.'], $validatedData['hargaLunas_paket']);

        // Convert to proper decimal format
        $validatedData['hargaDP_paket']     = number_format((float) $validatedData['hargaDP_paket'], 2, '.', '');
        $validatedData['hargaLunas_paket']  = number_format((float) $validatedData['hargaLunas_paket'], 2, '.', '');

        // Update domain with resident names
        $paketPernikahan->update([
            'nama_paket'        => $validatedData['nama_paket'],
            'venue'             => $venue,
            'dekorasi'          => $dekorasi,
            'tata_rias'         => $tata_rias,
            'staff_acara'       => $validatedData['staff_acara'],
            'catering'          => $catering,
            'kue_pernikahan'    => $kue_pernikahan,
            'fotografer'        => $fotografer,
            'entertaiment'      => $entertaiment,
            'hargaDP_paket'     => $validatedData['hargaDP_paket'],
            'hargaLunas_paket'  => $validatedData['hargaLunas_paket'],
            'status_paket'      => $validatedData['status_paket'],
        ]);

        // Attach only non-null people to pivot table
        $kerjasamaToAttach = [];
        if ($validatedData['venue']) {
            $kerjasamaToAttach[] = $validatedData['venue'];
        }
        if ($validatedData['dekorasi']) {
            $kerjasamaToAttach[] = $validatedData['dekorasi'];
        }
        if ($validatedData['tata_rias']) {
            $kerjasamaToAttach[] = $validatedData['tata_rias'];
        }
        if ($validatedData['catering']) {
            $kerjasamaToAttach[] = $validatedData['catering'];
        }
        if ($validatedData['kue_pernikahan']) {
            $kerjasamaToAttach[] = $validatedData['kue_pernikahan'];
        }
        if ($validatedData['fotografer']) {
            $kerjasamaToAttach[] = $validatedData['fotografer'];
        }
        if ($validatedData['entertaiment']) {
            $kerjasamaToAttach[] = $validatedData['entertaiment'];
        }

        $paketPernikahan->kerjasama()->sync($kerjasamaToAttach);

        return redirect('/admin/paket-pernikahan');
    }

    public function destroy(PaketPernikahan $paketPernikahan)
    {
        // Detach related people from the pivot table before deleting the domain
        $paketPernikahan->kerjasama()->detach();

        $paketPernikahan->delete();

        return redirect('/admin/paket-pernikahan');
    }
}
