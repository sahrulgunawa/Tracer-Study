<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $table = 'tbl_program_keahlian';
    protected $primaryKey = 'id_program_keahlian';
    protected $fillable = [
        'id_bidang_keahlian',
        'kode_program_keahlian',
        'program_keahlian',
    ];

    // Relasi dengan model BidangKeahlian
    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang_keahlian');
    }
}