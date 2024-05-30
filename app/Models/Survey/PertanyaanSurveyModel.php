<?php

namespace App\Models\Survey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanSurveyModel extends Model
{
    use HasFactory;

    public $table = 'pertanyaan_survey';

    protected $fillable = [
        'survey_id',
        'pertanyaan',
        'jenis',
        'is_deleted',
    ];

    public function survey()
    {
        return $this->belongsTo(SurveyModel::class, 'survey_id');
    }
}
