<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyModel extends Model
{
    use HasFactory;
    public $table = 'survey';
    protected $fillable = [
        'judul_survey',
        'tanggal_buat',
        'status',
        'is_deleted',
    ];
}