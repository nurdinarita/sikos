<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kos;

class ManagementKosController extends Controller
{
    public function index()
    {
        return view('admin.managementKos.index')->with([
            'kos' => Kos::latest()->where('user_id', auth()->user()->id)->get(),
            'active' => 'Management Kos',
        ]);
    }

    public function create()
    {
        return view('admin.managementKos.form')->with([
            'active' => 'Management Kos',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namakos' => 'required',
            'hargaperbulan' => 'required|numeric',
            'hargapertahun' => 'required|numeric',
            'jumlahkamar' => 'required|numeric',
            'gambarkos' => 'required|image',
            'fasilitas' => 'required',
            'koskhusus' => 'required',
            'alamat' => 'required',
        ]);

        if($request->file('gambarkos')){
            $request->file('gambarkos')->storePubliclyAs('public/gambar-kos', $request->file('gambarkos')->hashName());
            $validatedData['gambarkos'] = $request->file('gambarkos')->hashName();
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 1;
        Kos::create($validatedData);
        return redirect('management-kos')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show($id)
    {
        return view('admin.managementKos.detail')->with([
            'kos' => Kos::find($id),
            'active' => 'Management Kos',
        ]);
    }

    public function edit($id)
    {
        return view('admin.managementKos.form')->with([
            'kos' => Kos::find($id),
            'active' => 'Management Kos',
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namakos' => 'required',
            'hargaperbulan' => 'required|numeric',
            'hargapertahun' => 'required|numeric',
            'jumlahkamar' => 'required|numeric',
            'gambarkos' => 'image',
            'fasilitas' => 'required',
            'koskhusus' => 'required',
            'alamat' => 'required',
        ]);

        if($request->file('gambarkos')){
            $request->file('gambarkos')->storePubliclyAs('public/gambar-kos', $request->file('gambarkos')->hashName());
            $validatedData['gambarkos'] = $request->file('gambarkos')->hashName();
        }
        Kos::find($id)->update($validatedData);
        return redirect('management-kos')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $kos = Kos::find($id)->delete();
        return redirect('/management-kos')->with('success', 'Data Berhasil Dihapus');     
    }

    public function updateStatus($id)
    {
        $kos = Kos::find($id);
        if($kos->status == 1){
            $kos->update(['status' => 0]);
        }else{
            $kos->update(['status' => 1]);
        }
        return redirect('/management-kos')->with('success', 'Data Berhasil Diupdate');     
    }
}
