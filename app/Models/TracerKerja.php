<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerKerja extends Model
{
    use HasFactory;

    protected $table = 'tbl_tracer_kerja';
    protected $primaryKey = 'id_tracer_kerja';
    public $incrementing = true;

    protected $fillable = [
        'id_alumni',
        'tracer_kerja_pekerjaan',
        'tracer_kerja_nama',
        'tracer_kerja_jabatan',
        'tracer_kerja_status',
        'tracer_kerja_lokasi',
        'tracer_kerja_alamat',
        'tracer_kerja_tgl_mulai',
        'tracer_kerja_gaji',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni');
    }
}

