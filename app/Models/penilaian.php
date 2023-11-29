<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_karyawan',
        'id_penilai',
        'id_krkiteria',
        'skor',
    ];

    public function kriterias()
    {
        return $this->belongsToMany(kriteria::class, 'penilaian_kriteria', 'penilaian_id', 'kriteria_id')
            ->withPivot('nilai');
    }

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'id_karyawan', 'id');
    }

    public function kriteria()
    {
        return $this->belongsTo(kriteria::class, 'id_krkiteria', 'id');
    }

}
