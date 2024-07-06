<?php

namespace Database\Factories\Survey;
use App\Models\Survey\JawabanSurveyPGModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey\JawabanSurveyPGModel>
 */
class JawabanSurveyPGModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = JawabanSurveyPGModel::class;
    public function definition(): array
    {
        return [
            'user_id' => 390,
            'survey_id'=> 57,
            'pertanyaan_id' => 66,
            'tanggal' => now(),
            'jawaban_pg' => 100,
            'is_deleted' => 'no'
        ];
    }
}