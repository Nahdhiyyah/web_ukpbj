<?php

namespace Tests\Unit\Survey;

use App\Models\Survey\PertanyaanSurveyModel;
use App\Models\Survey\SurveyModel;
use App\Models\User;
use Tests\TestCase;

class PertanyaanTest extends TestCase
{
    public function test_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a survey
        $survey = SurveyModel::factory()->create();

        // Create some pertanyaans related to the survey
        $pertanyaan = PertanyaanSurveyModel::factory()->count(3)->create(['survey_id' => $survey->id]);

        // Hit the index route
        $response = $this->withoutMiddleware()->get(route('pertanyaan.index', ['id' => $survey->id]));

        // Assert successful response
        $response->assertStatus(200);

        // Assert the survey data is present in the view
        $response->assertViewHas('survey', $survey);

        // Assert the pertanyaans data is present in the view
        $response->assertViewHas('pertanyaan', $pertanyaan);
    }

    public function test_create()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $survey = SurveyModel::factory()->create();

        // Memanggil metode user_create_balas dengan id konsultasi yang baru dibuat
        $response = $this->get("create pertanyaan{$survey->id}");

        // Memeriksa bahwa halaman telah berhasil dimuat
        $response->assertStatus(200);

        // Memeriksa bahwa variabel user_balas telah dikirimkan ke tampilan
        $response->assertViewHas('survey', $survey);
    }

    public function test_store()
    {
        // Membuat pengguna dan mengotentikasi
        $user = User::factory()->create();
        $this->actingAs($user);

        $survey = SurveyModel::factory()->create();

        // Data untuk permintaan
        $data = [
            'survey_id' => $survey->id,
            'pertanyaan' => 'Bagaimana menurut anda mengenai pelayanan yang dilakukan oleh pegawai di UKPBJ Kabupaten Banyuwangi?',
            'jenis' => 'Pilihan ganda',
            'is_deleted' => 'no',
        ];

        // Melakukan permintaan POST ke rute store.konsul.user tanpa middleware
        $response = $this->withoutMiddleware()->post(route('pertanyaan.store', ['id' => $survey->id]), $data);

        // Memeriksa bahwa pengguna dialihkan ke rute yang diharapkan
        $response->assertRedirect(route('pertanyaan.index', $survey->id));

        // Memeriksa bahwa konsultasi dibuat di database
        $this->assertDatabaseHas('pertanyaan_survey', $data);
    }

    public function test_hapus_pertanyaan()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel instance
        $pertanyaan = PertanyaanSurveyModel::factory()->create();

        // Make a DELETE request to destroy the konsultasi
        $response = $this->withoutMiddleware()->get(route('pertanyaan.hapus', $pertanyaan->id));

        // Check that the page redirects correctly
        $response->assertRedirect(route('survey.index'));

        // Check that the KonsultasiModel instance is marked as deleted
        $this->assertDatabaseHas('pertanyaan_survey', [
            'id' => $pertanyaan->id,
            'is_deleted' => 'yes',
        ]);
    }
}