<?php

namespace App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    public $table = 'ukpbj.pengumuman';
    protected $fillable = [
      'user_id',
      'judul',
      'isi',
      'tanggal',
      'waktu',
      'gambar', 
      'document', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}