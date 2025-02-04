<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerKuliah extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'tbl_tracer_kuliah';

    // Define the primary key column (since it is not the default "id")
    protected $primaryKey = 'id_tracer_kuliah';

    // Other model properties...
    protected $fillable = [
        'id_alumni',
        'tracer_kuliah_kampus',
        'tracer_kuliah_status',
        'tracer_kuliah_jenjang',
        'tracer_kuliah_jurusan',
        'tracer_kuliah_linier',
        'tracer_kuliah_alamat',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni', 'id_alumni');
    }
}
