<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Suara;
use App\Models\TPS;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('dashboard', compact('user'));
    }

    public function input_view()
    {
        $user = User::all();
        $kecamatans = Kecamatan::with('desa.tps')->get();
        return view('input-other', compact('kecamatans', 'user'));
    }

    public function proses_tps(Request $request)
    {
        $desas = Desa::where('id', $request->desa)->first();
        session(['jumlah_tps' => $desas->jumlah_tps]);
        return redirect()->route('input')->with('desa', $desas);
    }

    public function proses_input(Request $request)
    {
        dd($request->all());
    }
}
