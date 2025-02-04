<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAlumni extends Model
{
    use HasFactory;

    protected $table = 'tbl_status_alumni';
    protected $primaryKey = 'id_status_alumni';
    protected $fillable = ['status'];
}
