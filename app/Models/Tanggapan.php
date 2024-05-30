<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PengaduanUser;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';

    protected $fillable = [
        'id', 'pengaduan_id', 'tanggapan', 'petugas_id',
    ];

    protected $hidden = [

    ];

    public function pengaduan()
    {
        return $this->hasOne(PengaduanUser::class, 'id', 'user_id');
    }

    public function proses()
    {
        return $this->hasMany(PengaduanUser::class, 'status_id', 'status');
    }

    public function country()
    {
        return $this->hasOne(PengaduanUser::class);
    }
}