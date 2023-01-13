<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spacework extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = "id_space";
    protected $fillable = [
        'image',
        'pemilik_space',
        'nama_space',
        'harga',
        'rate',
        'lokasi',
        'no_rek',
        'id_pemilik',
        'id_fasilitas',
    ];
}
