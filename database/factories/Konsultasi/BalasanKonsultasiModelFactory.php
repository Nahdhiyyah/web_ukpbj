<?php

namespace Database\Factories\Konsultasi;
use App\Models\Konsultasi\BalasanKonsultasiModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BalasanKonsultasiModel>
 */
class BalasanKonsultasiModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BalasanKonsultasiModel::class;
    public function definition(): array
    {
        return [
            'user_id' => 11,
            'konsul_id' => 6,
            'balasan' => 'ini adalah contoh balasan',
            'is_deleted' => 'no' 
        ];
    }
}