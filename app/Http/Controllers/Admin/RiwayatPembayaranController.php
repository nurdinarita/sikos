<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenghuniKos;
use App\Models\Pembayaran;

class RiwayatPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.riwayatpembayaran.index')->with([
            'active' => 'Riwayat Pembayaran',
            'pembayaran' => Pembayaran::latest()->get()
        ]);
    }


    public function updatePembayaran($id)
    {
        $penghuni = PenghuniKos::find($id);

        $penghuni->update(['status' => 1]);
        Pembayaran::create([
            'penghuni_id' => $penghuni->id,
            'tanggalbayar' => request()->tanggalbayar,
        ]);
        return back()->with('success','Pembayaran Berhasil Diupdate');
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
