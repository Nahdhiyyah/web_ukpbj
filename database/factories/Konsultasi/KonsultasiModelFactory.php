<?php

namespace Database\Factories\Konsultasi;

use App\Models\Konsultasi\KonsultasiModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KonsultasiModel>
 */
class KonsultasiModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = KonsultasiModel::class;

    public function definition(): array
    {
        return [
            'user_id' => 11,
            'subjek'=> 'Akun SPSE',
            'isi'=> 'bagaimana cara mendaftar akun SPSE?',
            'attachment' => 'example.pdf',
            'status' => 'terkirim',
            'is_deleted'=> 'no',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}