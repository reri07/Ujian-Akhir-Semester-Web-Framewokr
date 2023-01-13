<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $primaryKey = "id_fasilitas";
    protected $fillable = [
        'id_fasilitas',
        'fasilitas_1',
        'fasilitas_2',
        'fasilitas_3',
        'fasilitas_4',
    ];
}
