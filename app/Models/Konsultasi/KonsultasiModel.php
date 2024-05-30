<?php

namespace App\Models\Konsultasi;
use App\Models\User;
use App\Models\Konsultasi\BalasanKonsultasiModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiModel extends Model
{
    use HasFactory;

    public $table = 'konsultasi';

    protected $fillable = [
        'user_id',
        'subjek',
        'isi',
        'attachment',
        'status',
        'is_deleted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function balas()
    {
        return $this->hasMany(BalasanKonsultasiModel::class, 'id');
    }
}