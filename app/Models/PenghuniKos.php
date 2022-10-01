<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghuniKos extends Model
{
    use HasFactory;
    protected $table = 'penghuni_kos';
    protected $guarded = [''];

    public function kos()
    {
        return $this->belongsTo(Kos::class);
    }
}
