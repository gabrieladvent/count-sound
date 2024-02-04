<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\TPS;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()  {
        $user = User::all();
        return view('dashboard', compact('user'));
    }

    public function input_view() {
        $user = User::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $tps = TPS::all();

        // dd($user->count(), $kecamatan->count(), $desa->count(), $tps->count());
        return view('input', compact('user', 'kecamatan', 'desa', 'tps'));
    }
}
