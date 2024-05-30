<?php

namespace App\Models\Survey;
use App\Models\Survey\PertanyaanSurveyModel;
use App\Models\Survey\SurveyModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanSurveyIsianModel extends Model
{
    use HasFactory;
    public $table = 'jawaban_survey_isian';
    protected $fillable = [
        'user_id',
        'survey_id',
        'pertanyaan_id',
        'tanggal',
        'jawaban_isian',
        'is_deleted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(PertanyaanSurveyModel::class, 'pertanyaan_id');
    }

    public function survey()
    {
        return $this->belongsTo(SurveyModel::class, 'survey_id');
    }
    
}