<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rangking extends Model
{
    use HasFactory;

    protected $table='rankings';
    protected $fillable = ['id_karyawan', 'total_nilai', 'ranking'];

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'id_karyawan');
    }

}
