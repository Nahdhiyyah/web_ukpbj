<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    use HasFactory;

    public $table = 'satkers';

    protected $fillable = [
        'kd_klpd',
        'nama_klpd',
        'jenis_klpd',
        'kd_satker',
        'kd_satker_str',
        'nama_satker',
    ];
}
