<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class PengaduanModel extends Model
{
    //use SoftDeletes;
    use HasFactory;

    public $table = 'pengaduan';

    protected $fillable = [
        'user_id',
        'user_id_petugas',
        'attachment',
        'judul',
        'isi',
        'status',
        'balasan',
        'is_deleted',
    ];

    protected $hidden = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user_petugas()
    {
        return $this->belongsTo(User::class, 'user_id_petugas');
    }

    // public function details()
    // {
    //     return $this->hasMany(PengaduanUser::class, 'id', 'user_id');
    // }

    // public function tanggapans()
    // {
    //     return $this->belongsTo(PengaduanUser::class, 'id', 'user_id');
    // }

    // public function tanggapan()
    // {
    //     return $this->hasOne(Tanggapan::class);
    // }

    // public function status()
    // {
    //     return $this->belongsTo(Tanggapan::class, 'status_id', 'status');
    // }
}