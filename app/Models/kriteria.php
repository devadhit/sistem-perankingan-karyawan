<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = ['kriterianame'];

    public function penilaians()
    {
        return $this->belongsToMany(penilaian::class, 'penilaian_kriteria', 'kriteria_id', 'penilaian_id')
            ->withPivot('nilai');
    }

}
