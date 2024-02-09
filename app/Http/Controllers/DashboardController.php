<?php

namespace App\Http\Controllers;

use App\Models\TPS;
use App\Models\Desa;
use App\Models\User;
use App\Models\Suara;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $kecamatans = Kecamatan::all();
        $suara = Suara::all();

        $userSatu = 0;
        $userDua = 0;
        $userTiga = 0;
        $userEmpat = 0;

        foreach ($suara as $dataSuara) {
            $userId = $dataSuara->id_user;
            $jumlahSuara = $dataSuara->jumlah_suara;

            switch ($userId) {
                case 1:
                    $userSatu += $jumlahSuara;
                    break;
                case 2:
                    $userDua += $jumlahSuara;
                    break;
                case 3:
                    $userTiga += $jumlahSuara;
                    break;
                case 4:
                    $userEmpat += $jumlahSuara;
                    break;
                default:
                    break;
            }
        }

        return view('dashboard', compact('users', 'userSatu', 'userDua', 'userTiga', 'userEmpat'));
    }

    public function input_view()
    {
        $user = User::all();
        $kecamatans = Kecamatan::with('desa.tps')->get();
        $suara = Suara::all();

        $userSatu = 0;
        $userDua = 0;
        $userTiga = 0;
        $userEmpat = 0;

        // Iterasi melalui data suara untuk menghitung jumlah suara tiap user
        foreach ($suara as $dataSuara) {
            $userId = $dataSuara->id_user;
            $jumlahSuara = $dataSuara->jumlah_suara;

            // Menyimpan jumlah suara ke variabel yang sesuai berdasarkan ID pengguna
            switch ($userId) {
                case 1:
                    $userSatu += $jumlahSuara;
                    break;
                case 2:
                    $userDua += $jumlahSuara;
                    break;
                case 3:
                    $userTiga += $jumlahSuara;
                    break;
                case 4:
                    $userEmpat += $jumlahSuara;
                    break;
                default:
                    break;
            }
        }

        // dd($userTiga);

        // Kirimkan data ke view
        return view('input-other', compact('kecamatans', 'user', 'userSatu', 'userDua', 'userTiga', 'userEmpat'));
    }


    public function proses_tps(Request $request)
    {
        $desas = Desa::where('id', $request->desa)->first();
        session(['jumlah_tps' => $desas->jumlah_tps]);
        return redirect()->route('input')->with('desa', $desas);
    }

    public function proses_input(Request $request)
    {
        $id_user = $request->id_user;
        $id_kecamatan = $request->id_kecamatan;

        // dd($request->all());

        // Ambil inputan tps
        DB::beginTransaction();
        try {
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'tps') === 0) {
                    $parts = explode('_', $key);
                    $tps_number = $parts[0]; // Ambil nomor TPS dari array pertama
                    $tps_number = preg_replace('/[^0-9]/', '', $tps_number);
                    $id_desa = $parts[1]; // Ambil ID desa dari array kedua

                    // Dapatkan ID desa berdasarkan ID yang ditemukan
                    $desa = Desa::find($id_desa);
                    if ($desa) {
                        Suara::create([
                            'jumlah_suara' => $value,
                            'id_tps' => $tps_number,
                            'id_desa' => $id_desa,
                            'id_user' => $id_user,
                        ]);
                    } else {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Gagal Menginput');
                    }
                }
            }

            // Hitung jumlah suara untuk tiap desa
            $desas = Desa::all();
            foreach ($desas as $desa) {
                $suaraDesa = Suara::where('id_desa', $desa->id)->get();
                $totalSuara = 0;
                foreach ($suaraDesa as $suara) {
                    $totalSuara += $suara->jumlah_suara;
                }
                $desa->update(['total_suara' => $totalSuara]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan' . $e);
        }
    }

    public function output_suara()
    {
        $users = User::all();
        $kecamatans = Kecamatan::all();
        $suara = Suara::all();
        $tps = TPS::all();


        $hasilSuaraPerKecamatan = [];
        foreach ($kecamatans as $kecamatan) {
            $desas = Desa::where('id_kecamatan', $kecamatan->id)->pluck('id');
            $hasilSuaraPerUser = [];

            foreach ($users as $user) {
                $jumlahSuaraPerUser = Suara::whereIn('id_desa', $desas)
                    ->where('id_user', $user->id)
                    ->sum('jumlah_suara');
                $hasilSuaraPerUser[$user->name] = $jumlahSuaraPerUser;
            }
            $hasilSuaraPerKecamatan[] = [
                'nama_kecamatan' => $kecamatan->nama_kecamatan,
                'hasil_suara' => $hasilSuaraPerUser
            ];
        }

        $userSatu = 0;
        $userDua = 0;
        $userTiga = 0;
        $userEmpat = 0;

        foreach ($suara as $dataSuara) {
            $userId = $dataSuara->id_user;
            $jumlahSuara = $dataSuara->jumlah_suara;

            switch ($userId) {
                case 1:
                    $userSatu += $jumlahSuara;
                    break;
                case 2:
                    $userDua += $jumlahSuara;
                    break;
                case 3:
                    $userTiga += $jumlahSuara;
                    break;
                case 4:
                    $userEmpat += $jumlahSuara;
                    break;
                default:
                    break;
            }
        }

        $hasilSuaraPerUser = [];
        foreach ($users as $user) {
            $jumlahSuara = Suara::where('id_user', $user->id)->sum('jumlah_suara');
            $hasilSuaraPerUser[$user->id] = $jumlahSuara;
        }


        $nilai = [
            'Caleg 1' => $userSatu,
            'Caleg 2' => $userDua,
            'Caleg 3' => $userTiga,
            'Caleg 4' => $userEmpat
        ];
        asort($nilai);
        $pemenang = key($nilai);
        $nilaiPemenang = current($nilai);

        return view('hasil-suara', compact('users', 'userSatu', 'userDua', 'userTiga', 'userEmpat', 'hasilSuaraPerKecamatan', 'kecamatans', 'tps', 'suara', 'hasilSuaraPerUser', 'nilai', 'pemenang', 'nilaiPemenang'));
    }

    private function updateJumlahSuaraDesaForUser($userId)
    {
        // Ambil semua suara untuk pengguna dengan ID yang ditentukan
        $suaraUser = Suara::where('id_user', $userId)->get();

        // Inisialisasi array untuk menyimpan total jumlah suara per desa
        $totalSuaraPerDesa = [];

        // Jumlahkan jumlah suara dari setiap TPS dan kelompokkan berdasarkan ID desa
        foreach ($suaraUser as $suara) {
            $totalSuaraPerDesa[$suara->id_desa] = isset($totalSuaraPerDesa[$suara->id_desa]) ? $totalSuaraPerDesa[$suara->id_desa] + $suara->jumlah_suara : $suara->jumlah_suara;
        }

        // Update jumlah_suara di tabel desa berdasarkan hasil penghitungan
        foreach ($totalSuaraPerDesa as $idDesa => $totalSuara) {
            $desa = Desa::find($idDesa);
            if ($desa) {
                $desa->update(['jumlah_suara' => $totalSuara]);
            }
        }
    }
}
