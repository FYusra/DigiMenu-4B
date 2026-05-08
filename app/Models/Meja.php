<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'meja';
    protected $primaryKey = 'id_meja';
    protected $fillable = [
        'id_meja',
        'no_meja',
        'kapasitas',
        'tatus_meja'
    ];

    public function order(){
        return $this->hasMany(Meja::class, 'id_meja', 'id_meja');
    }
}