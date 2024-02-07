<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    use HasFactory;
    protected $table = 'suaras';
    protected $fillable = ['jumlah_suara', 'id_tps', 'id_desa', 'id_user'];

    public function tps()
    {
        return $this->belongsTo(Tps::class, 'id_tps');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
