<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaranDestinasi extends Model
{
    use HasFactory;

    protected $table = 'saran_destinasi';

    protected $fillable = [
        'nama_tempat',
        'lokasi',
    ];
}
