<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'desas';
    protected $fillable = ['nama_desa', 'id_kecamatan', 'jumlah_tps', 'total_suara'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }

    public function tps()
    {
        return $this->hasMany(TPS::class, 'id_desa');
    }
}
