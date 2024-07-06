<?php

namespace Tests\Unit\Survey;

use App\Models\Survey\JawabanSurveyIsianModel;
use App\Models\Survey\JawabanSurveyPGModel;
use App\Models\Survey\PertanyaanSurveyModel;
use App\Models\Survey\SurveyModel;
use App\Models\User;
use Tests\TestCase;

class RekapSurveyTest extends TestCase
{
    public function test_index()
    {
        // Buat pengguna dan autentikasi sebagai pengguna tersebut
        $user = User::factory()->create();
        $this->actingAs($user);

        // Panggil metode index
        $response = $this->get(route('jawaban.index'));

        // Periksa status respons
        $response->assertStatus(200);

        // Periksa apakah view yang diharapkan dirender
        $response->assertViewIs('admin.survey.rekap_jawaban');

        // Periksa apakah data jawaban_pg dikirim ke view
        $response->assertViewHas('jawaban_pg');
    }

    public function test_show()
    {
        // Buat pengguna
        $user = User::factory()->create();
        $this->actingAs($user);

        // Buat survei
        $survey = SurveyModel::factory()->create();
        $pertanyaan = PertanyaanSurveyModel::factory()->create(['survey_id' => $survey->id]);
        // Buat jawaban pilihan ganda terkait dengan survei
        $jawaban_pg = JawabanSurveyPGModel::factory()->create([
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaan->id,
            'tanggal' => now()->toDateString(),
            'jawaban_pg' => 75, // Misalnya jawaban 75
            'is_deleted' => 'no',
        ]);

        // Buat jawaban isian terkait dengan survei
        $jawaban_isian = JawabanSurveyIsianModel::factory()->create([
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaan->id,
            'tanggal' => now()->toDateString(),
            'jawaban_isian' => 'Jawaban isian pengguna', // Misalnya jawaban isian
            'is_deleted' => 'no',
        ]);

        // Panggil metode show
        $response = $this->get(route('jawaban.detail', [
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'tanggal' => now()->toDateString(),
        ]));

        // Periksa status respons
        $response->assertStatus(200);

        // Periksa apakah data predikat dikirim ke view
        $response->assertViewHas('predikat');

        // Periksa apakah data jawaban_pg dikirim ke view
        $response->assertViewHas('jawaban_pg');

        // Periksa apakah data jawaban_isian dikirim ke view
        $response->assertViewHas('jawaban_isian');

        // Periksa apakah total jumlah jawaban dikirim ke view
        $response->assertViewHas('total');

        // Periksa apakah view yang benar dikembalikan
        $response->assertViewIs('admin.survey.detail_jawaban');
    }

    public function test_hapus_rekap()
    {
        // Buat pengguna
        $user = User::factory()->create();
        $this->actingAs($user);
        // Buat survei
        $survey = SurveyModel::factory()->create();
        $pertanyaan = PertanyaanSurveyModel::factory()->create(['survey_id' => $survey->id]);
        // Buat jawaban pilihan ganda terkait dengan survei
        $jawaban_pg = JawabanSurveyPGModel::factory()->create([
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaan->id,
            'tanggal' => now()->toDateString(),
            'jawaban_pg' => 75, // Misalnya jawaban 75
            'is_deleted' => 'no',
        ]);

        // Buat jawaban isian terkait dengan survei
        $jawaban_isian = JawabanSurveyIsianModel::factory()->create([
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaan->id,
            'tanggal' => now()->toDateString(),
            'jawaban_isian' => 'Jawaban isian pengguna', // Misalnya jawaban isian
            'is_deleted' => 'no',
        ]);

        // Panggil metode hapus_rekap
        $response = $this->actingAs($user)->get(route('jawaban.hapus', [
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'tanggal' => now()->toDateString(),
        ]));

        // Periksa apakah terjadi pengalihan (redirect) ke halaman index
        $response->assertRedirect(route('jawaban.index'));

        // Periksa apakah data jawaban pilihan ganda telah dihapus
        $this->assertDatabaseHas('jawaban_survey_pg', [
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaan->id,
            'tanggal' => now()->toDateString(),
            'is_deleted' => 'yes',
        ]);

        // Periksa apakah data jawaban isian telah dihapus
        $this->assertDatabaseHas('jawaban_survey_isian', [
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaan->id,
            'tanggal' => now()->toDateString(),
            'is_deleted' => 'yes',
        ]);
    }
}