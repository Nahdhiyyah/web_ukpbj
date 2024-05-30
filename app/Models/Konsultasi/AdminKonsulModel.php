<?php

namespace App\Models\Konsultasi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminKonsulModel extends Model
{
    use HasFactory;
    public $table = 'admin_konsul_models';
    protected $fillable = [
        'user_id',
        'user_konsul_id',
        'balasan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}