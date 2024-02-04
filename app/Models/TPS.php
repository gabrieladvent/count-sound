<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPS extends Model
{
    use HasFactory;
    protected $tabel = 't_p_s';
    protected $fillable = ['nomor_tps', 'total_suara', 'id_desa'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function caleg()
    {
        return $this->belongsTo(User::class, 'id_caleg');
    }

    public function suaras()
    {
        return $this->hasMany(Suara::class);
    }
}
