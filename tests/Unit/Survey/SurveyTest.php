<?php

namespace Tests\Unit\Survey;

use App\Models\Survey\SurveyModel;
use App\Models\User;
use Tests\TestCase;

class SurveyTest extends TestCase
{
    public function test_index_survey()
    {
        // Arrange: Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Arrange: Create multiple survey entries
        $survey1 = SurveyModel::factory()->create(['created_at' => now()->subDays(1), 'is_deleted' => 'no']);
        $survey2 = SurveyModel::factory()->create(['created_at' => now(), 'is_deleted' => 'no']);

        // Act: Call the index method
        $response = $this->withoutMiddleware()->get('survey'); // Adjust the route URL as necessary

        // Assert: Check if the view is correct
        $response->assertViewIs('admin.survey.index_survey');

        // Assert: Check if the surveys are passed and have the expected property
        $response->assertViewHas('survey', function ($survey_admin) {
            // Ensure the survey_admin variable is not null and is a collection
            if (is_null($survey_admin) || ! is_a($survey_admin, 'Illuminate\Database\Eloquent\Collection')) {
                return false;
            }

            return $survey_admin->every(fn ($survey) => $survey->is_deleted === 'no');
        });

        // Additional assertion to check the order of the data based on created_at
        $survey_admin = $response->original->getData()['survey'];

        $this->assertTrue($survey_admin[0]->created_at->gt($survey_admin[1]->created_at));
    }

    public function test_create_survey()
    {
        // Arrange: Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Act: Call the create method
        $response = $this->get(route('survey.create'));

        // Assert: Check if the correct view is returned
        $response->assertStatus(200);
        $response->assertViewIs('admin.survey.create_survey');
    }

    public function test_store_survey()
    {
        // Arrange: Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'judul_survey' => 'Survey Pelayanan Publik',
            'tanggal_buat' => now()->format('Y-m-d'), // Ubah sesuai kebutuhan
            'status' => 'Active',
            'is_deleted' => 'no',
        ];

        // Act: Call the store method with valid data
        $response = $this->withoutMiddleware()->post(route('survey.store'), $data);

        // Assert the correct redirect
        $response->assertRedirect(route('survey.index'));

        // Assert survey creation in the database
        $this->assertDatabaseHas('survey', $data);

    }

    public function test_edit_survey()
    {
        // Arrange: Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Arrange: Create a survey
        $survey = SurveyModel::factory()->create();

        // Act: Call the edit method with survey id
        $response = $this->get(route('survey.edit', ['id' => $survey->id]));

        // Assert the response
        $response->assertStatus(200);
        $response->assertViewIs('admin.survey.edit_survey');
        $response->assertViewHas('survey', $survey);
    }

    public function test_update_survey()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel instance
        $survey = SurveyModel::factory()->create();

        // New data for update
        $requestData = [
            'judul_survey' => 'Updated Subjek',
        ];

        // Make a POST request to update the konsultasi
        $response = $this->withoutMiddleware()->put(route('survey.update', $survey->id), $requestData);

        // Check that the page redirects correctly
        $response->assertRedirect(route('survey.index'));

        // Check that the data was updated in the database
        $this->assertDatabaseHas('survey', $requestData);
    }

    public function test_hapus_survey()
    {
        // Arrange: Create a survey instance in the database
        $survey = SurveyModel::factory()->create();

        $requestData = [
            'id' => $survey->id,
            'judul_survey' => 'Survey Pelayanan Publik',
            'tanggal_buat' => now()->format('Y-m-d'),
            'is_deleted' => 'yes',
        ];
        
        // Act: Call the hapus_survey method
        $response = $this->withoutMiddleware()->get(route('survey.hapus', $survey->id));

        // Assert: Check if the survey is marked as deleted
        $this->assertDatabaseHas('survey', $requestData);

        // Assert: Check if the response redirects to the survey index
        $response->assertRedirect(route('survey.index'));
    }
}