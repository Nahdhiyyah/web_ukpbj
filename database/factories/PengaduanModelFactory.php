<?php

namespace Database\Factories;

use App\Models\PengaduanModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengaduanModel>
 */
class PengaduanModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PengaduanModel::class;

    public function definition(): array
    {
        return [
            'user_id' => 303,
            'user_id_petugas' => 302,
            'attachment' => 'example.pdf',
            'judul'=> 'Kerusakan gedung',
            'isi'=> 'ada kerusakan dibagian belakang gedung',
            'status'=> 'Terkirim',
            'balasan' => 'Baik, akan kami proses',
            'is_deleted' => 'no',
        ];
    }
}