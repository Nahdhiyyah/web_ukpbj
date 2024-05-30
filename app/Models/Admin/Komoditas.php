<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    use HasFactory;
    public $table = 'ukpbj.komoditas';
    protected $fillable = [
        'kd_komoditas',
        'nama_komoditas',
        'jenis_katalog',
        'nama_instansi_katalog',
        'kd_instansi_katalog'
    ];
}