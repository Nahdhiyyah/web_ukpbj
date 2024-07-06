<?php

namespace Tests\Unit\Survey;

use App\Models\Survey\PertanyaanSurveyModel;
use App\Models\Survey\SurveyModel;
use App\Models\Survey\JawabanSurveyPGModel;
use App\Models\Survey\JawabanSurveyIsianModel;
use App\Models\User;
use Tests\TestCase;

class JawabanTest extends TestCase
{
    public function test_index_survey()
    {
        // Membuat pengguna dan mengautentikasi sebagai pengguna tersebut
        $user = User::factory()->create();
        $this->actingAs($user);

        // Membuat satu survei
        $survey = SurveyModel::factory()->create();

        // Mengakses route index tanpa menggunakan ID
        $response = $this->withoutMiddleware()->get(route('index.survey.user'));

        // Memastikan respons berhasil
        $response->assertStatus(200);
    }

    public function test_index_pertanyaan()
    {
        // Membuat pengguna dan mengautentikasi sebagai pengguna tersebut
        $user = User::factory()->create();
        $this->actingAs($user);

        // Membuat survei
        $survey = SurveyModel::factory()->create();

        // Membuat satu pertanyaan terkait dengan survei tersebut
        $pertanyaan = PertanyaanSurveyModel::factory()->create(['survey_id' => $survey->id]);

        // Mengakses rute index_pertanyaan
        $response = $this->withoutMiddleware()->get(route('index.pertanyaan.user', ['id' => $survey->id]));

        // Memastikan respons sukses
        $response->assertStatus(200);
    }

    public function test_store_jawaban()
    {
        $user = User::factory()->create();
        $survey = SurveyModel::factory()->create();
        $pertanyaanPG = PertanyaanSurveyModel::factory()->create(['survey_id' => $survey->id, 'jenis' => 'Pilihan ganda']);
        $pertanyaanIsian = PertanyaanSurveyModel::factory()->create(['survey_id' => $survey->id, 'jenis' => 'Isian']);

        $this->actingAs($user);

        $response = $this->withoutMiddleware()->post(route('survey.store.user'), [
            'survey_id' => $survey->id,
            'jawaban_pg' => [
                $pertanyaanPG->id => 75
            ],
            'jawaban_isian' => [
                $pertanyaanIsian->id => 'Jawaban Isian'
            ],
        ]);

        $response->assertRedirect(route('index.survey.user'));
        // $response->assertSessionHas('alert.config.text', 'Terimakasih, Jawaban anda berhasil disimpan!');

        $this->assertDatabaseHas('jawaban_survey_pg', [
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaanPG->id,
            'jawaban_pg' => 75,
        ]);

        $this->assertDatabaseHas('jawaban_survey_isian', [
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaanIsian->id,
            'jawaban_isian' => 'Jawaban Isian',
        ]);
    }

    public function test_store_duplicate_jawaban_pg()
    {
        $user = User::factory()->create();
        $survey = SurveyModel::factory()->create();
        $pertanyaanPG = PertanyaanSurveyModel::factory()->create(['survey_id' => $survey->id, 'jenis' => 'Pilihan ganda']);

        JawabanSurveyPGModel::create([
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaanPG->id,
            'tanggal'=> now(), 
            'jawaban_pg' => 100,
            'is_deleted' => 'no',
        ]);

        $this->actingAs($user);

        $response = $this->withoutMiddleware()->post(route('survey.store.user'), [
            'survey_id' => $survey->id,
            'jawaban_pg' => [
                $pertanyaanPG->id => 75
            ]
        ]);

        $response->assertRedirect(route('index.survey.user'));
        // $response->assertSessionHas('alert.config.text', 'Anda sudah mengisi survey ini');

        $this->assertDatabaseMissing('jawaban_survey_pg', [
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaanPG->id,
            'jawaban_pg' => 75,
        ]);
    }

    public function test_store_duplicate_jawaban_isian()
    {
        $user = User::factory()->create();
        $survey = SurveyModel::factory()->create();
        $pertanyaanIsian = PertanyaanSurveyModel::factory()->create(['survey_id' => $survey->id, 'jenis' => 'Isian']);

        JawabanSurveyIsianModel::create([
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaanIsian->id,
            'tanggal' => now(),
            'jawaban_isian' => 'Existing Jawaban Isian',
            'is_deleted' => 'no',
        ]);

        $this->actingAs($user);

        $response = $this->withoutMiddleware()->post(route('survey.store.user'), [
            'survey_id' => $survey->id,
            'jawaban_isian' => [
                $pertanyaanIsian->id => 'Jawaban Isian Baru'
            ]
        ]);

        $response->assertRedirect(route('index.survey.user'));
        // $response->assertSessionHas('alert.config.text', 'Anda sudah mengisi survey ini');

        $this->assertDatabaseMissing('jawaban_survey_isian', [
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'pertanyaan_id' => $pertanyaanIsian->id,
            'jawaban_isian' => 'Jawaban Isian Baru',
        ]);
    }

}