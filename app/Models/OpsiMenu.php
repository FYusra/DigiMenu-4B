<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpsiMenu extends Model
{
    protected $table = 'opsi_menu';
    protected $priamryKey = 'id_opsi';
    protected $fillable = [
        'id_opsi',
        'id_menu',
        'nama_opsi'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }
    public function detailOpsi()
    {
        return $this->hasMany(DetailOpsiMenu::class, 'id_opsi', 'id_opsi');
    }
    
}