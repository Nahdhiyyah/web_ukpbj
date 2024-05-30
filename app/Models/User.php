<?php

namespace App\Models;
use App\Models\Konsultasi\UserKonsulModel;
use App\Models\Konsultasi\AdminKonsulModel;
use App\Models\PengaduanUser;
use Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'no_telp',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userKonsul()
    {
        return $this->hasMany(UserKonsulModel::class, 'id');
    }

    public function adminKonsul()
    {
        return $this->hasMany(AdminKonsulModel::class, 'id');
    }

    public function berita()
    {
        return $this->hasMany(Berita::class, 'id');
    }

    public function PengaduanUser(): HasMany
    {
        return $this->hasMany(PengaduanUser::class, 'user_id');
    }
}