<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'judul',
      'isi',
      'tanggal',
      'waktu',
      'gambar',  
    ];
}