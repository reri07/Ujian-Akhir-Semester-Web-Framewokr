<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boking extends Model
{
    use HasFactory;
    protected $primaryKey = "id_boking";

    protected $fillable = [
        'kd_boking',
        'jml_orang',
        'tgl_boking',
        'jam_boking',
        'jam_keluar',
        'satuan_harga',
        'status',
        'id_user',
        'id_space'
    ];
}
