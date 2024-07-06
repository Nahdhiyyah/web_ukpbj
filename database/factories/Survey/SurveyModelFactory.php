<?php

namespace Database\Factories\Survey;
use App\Models\Survey\SurveyModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey\SurveyModel>
 */
class SurveyModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SurveyModel::class;

    public function definition(): array
    {
        return [
            'judul_survey' => 'Survey Pelayanan Publik',
            'tanggal_buat' => now()->format('Y-m-d'),
            // 'status' => 'Not Active',
            // 'is_deleted' => 'no',
        ];
    }
}