<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;

class IndexController extends Controller
{
    public function index()
    {
        return view('index')->with([
            'kos' => Kos::latest()->get()
        ]);
    }

    public function show($id)
    {
        return view('detail')->with([
            'kos' => Kos::find($id),
            'terbaru' => Kos::latest()->paginate(5)
        ]);
    }

    public function all()
    {
        $kos = Kos::latest();

        if(request()->harga == 1)
        {
            $min = 150000;
            $max = 200000;
        }
        if(request()->harga == 2)
        {
            // $kos = Kos::whereBetween('hargaperbulan', [200000, 250000])->get();
            $min = 200000;
            $max = 250000;
        }
        if(request()->harga == 3)
        {
            // $kos = Kos::whereBetween('hargaperbulan', [250000, 300000])->get();
            $min = 250000;
            $max = 300000;
        }
        if(request()->harga == 4)
        {
            // $kos = Kos::whereBetween('hargaperbulan', [300000, 9999999999999999999999])->get();
            $min = 300000;
            $max = 9999999999999999999999;
        }else{
            $min = 0;
            $max = 9999999999999999999999;
        }

        if((request()->search || request()->kategori))
        {
            $kos = Kos::where('namakos', 'like',"%".request()->search."%")
            ->whereBetween('hargaperbulan', [$min, $max])
            ->where('koskhusus', request()->kategori );
        }

        // return $kos;
        return view('all')->with([
            'kos' => $kos->paginate(12),
            'terbaru' => Kos::latest()->paginate(5)
        ]);
    }
}
