<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;

    public $table = 'banner';

    protected $fillable = [
        'nomor',
        'gambar',
        'is_deleted',
    ];
}
