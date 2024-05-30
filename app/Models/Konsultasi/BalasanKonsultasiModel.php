<?php

namespace App\Models\Konsultasi;

use App\Models\User;
use App\Models\Konsultasi\KonsultasiModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalasanKonsultasiModel extends Model
{
    use HasFactory;

    public $table = 'balasan_konsultasi';

    protected $fillable = [
        'user_id',
        'konsul_id',
        'balasan',
        'is_deleted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function balas()
    {
        return $this->belongsTo(KonsultasiModel::class, 'konsul_id');
    }
}