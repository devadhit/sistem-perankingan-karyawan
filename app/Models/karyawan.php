<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posisi()
    {
        return $this->belongsTo(posisi::class,'id_posisi','id');
    }

    public function akun()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }

}
