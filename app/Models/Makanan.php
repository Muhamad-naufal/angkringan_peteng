<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'makanans';

    public $fillable = [
        'nama_makanan',
        'foto_makanan',
        'jum_makanan',
        'harga_makanan'
    ];
}
