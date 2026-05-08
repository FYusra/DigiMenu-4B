<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOpsiMenu extends Model
{
    protected $table = 'detail_opsi';
    protected $priamryKey = 'id_detail_opsi';
    protected $fillable =
    [
        'id_opsi',
        'nama_plihan',
        'tambahan_harga'
    ];

    public function opsiMenu()
    {
        return $this->belongsTo(OpsiMenu::class, 'id_opsi', 'is_opsi');
    }
    public function detailOrderOpsi()
    {
        return $this->hasMany(DetailOrderOpsi::class, 'id_detail_opsi', 'id_detail_opsi');
    }

}