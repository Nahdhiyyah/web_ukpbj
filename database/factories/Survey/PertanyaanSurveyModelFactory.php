<?php

namespace Database\Factories\Survey;

use App\Models\Survey\PertanyaanSurveyModel;
use App\Models\Survey\SurveyModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey\PertanyaanSurveyModel>
 */
class PertanyaanSurveyModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PertanyaanSurveyModel::class;

    public function definition(): array
    {
        // $survey = SurveyModel::get();
        return [
            // 'survey_id' => 65,
            'pertanyaan' => 'Bagaimana menurut anda mengenai pelayanan yang dilakukan oleh pegawai di UKPBJ Kabupaten Banyuwangi?',
            'jenis' => 'Pilihan ganda',
            'is_deleted' => 'no',
        ];
    }
}