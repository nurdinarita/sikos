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
        return view('all')->with([
            'kos' => Kos::latest()->get(),
            'terbaru' => Kos::latest()->paginate(5)
        ]);
    }
}
