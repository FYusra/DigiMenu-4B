<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\table;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';

    protected $fillable = [
        'id_menu', 
        'id_kategori',
        'nama_item',
        'harga',
        'deskripsi',
        'gambar',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriMenu::class, 'id_kategori', 'id_kategori');
    }
    
    public function opsiMenu()
    {
        return $this->hasMany(OpsiMenu::class, 'id_menu', 'id_menu');
    }
    
    public function detailOrder()
    {
        return $this->hasMany(DetailOrder::class, 'id_menu', 'id_menu');
    }
    
}