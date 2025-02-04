<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'tbl_testimoni';
    protected $primaryKey = 'id_testimoni';
    public $incrementing = true;

    protected $fillable = [
        'id_alumni',
        'testimoni',
        'tgl_testimoni'
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni');
    }
}
