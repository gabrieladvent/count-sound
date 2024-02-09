<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatans';
    protected $fillable = ['nama_kecamatan', 'jumlah_desa'];

    public function desa()
    {
        return $this->hasMany(Desa::class, 'id_kecamatan');
    }
}
