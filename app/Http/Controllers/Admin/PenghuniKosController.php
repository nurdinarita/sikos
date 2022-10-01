<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenghuniKos;
use App\Models\Kos;

class PenghuniKosController extends Controller
{
    public function index()
    {
        // return Kos::where('user_id', auth()->user()->id)->latest()->get();
        return view('admin.penghunikos.index')->with([
            'active' => 'Penghuni Kos',
            'kos' => Kos::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    public function detail($id)
    {
        return view('admin.penghunikos.detail')->with([
            'active' => 'Penghuni Kos',
            'kos_id' => $id,
            'penghuni_kos' => PenghuniKos::where('kos_id', $id)->latest()->get(),
        ]);
    }

    public function create($id)
    {
        return view('admin.penghunikos.form')->with([
            'active' => 'Penghuni Kos',
            'kos_id' => $id,
            'kos' => Kos::where('id', $id)->first(),
        ]);
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required|numeric',
            'nama_kamar' => 'required',
            'tanggal_mulai_sewa' => 'required',
            'tanggal_akhir_sewa' => 'required',
        ]);

        $validatedData['kos_id'] = $id;
        $validatedData['status'] = 0;

        PenghuniKos::create($validatedData);

        return redirect('penghuni-kos/'.$id)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        return view('admin.penghunikos.form')->with([
            'active' => 'Penghuni Kos',
            'kos_id' => $id,
            'kos' => Kos::where('id', $id)->first(),
            'penghuni_kos' => PenghuniKos::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        // return 'ok';
        $penghuni = PenghuniKos::find($id);
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required|numeric',
            'nama_kamar' => 'required',
            'tanggal_mulai_sewa' => 'required',
            'tanggal_akhir_sewa' => 'required',
        ]);

        // $validatedData['kos_id'] = $id;
        $validatedData['status'] = $penghuni->status;

        $penghuni->update($validatedData);

        return redirect('penghuni-kos/'.$penghuni->kos_id)->with('success', 'Data Berhasil Diupdate');
    }
}
