<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'tbl_sekolah';
    protected $primaryKey = 'id_sekolah';

    protected $fillable = [
        'npsn',
        'nss',
        'nama_sekolah',
        'alamat',
        'no_telp',
        'website',
        'email',
    ];
}
