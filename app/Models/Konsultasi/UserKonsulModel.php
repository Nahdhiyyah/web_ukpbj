<?php

namespace App\Models\Konsultasi;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKonsulModel extends Model
{
    use HasFactory;

    public $table = 'user_konsul_models';

    protected $fillable = [
        'user_id',
        'subjek',
        'message',
        'attachment',
        'status',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id');
    // }
}