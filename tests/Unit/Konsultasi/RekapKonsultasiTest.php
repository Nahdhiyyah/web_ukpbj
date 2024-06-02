<?php

namespace Tests\Unit\Konsultasi;

use App\Models\Konsultasi\KonsultasiModel;
use App\Models\User;
use Tests\TestCase;
use PDF;

class RekapKonsultasiTest extends TestCase
{
    public function test_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create mock consultations
        $konsul_selesai = KonsultasiModel::factory()->create(['status' => 'Selesai', 'created_at' => now(), 'is_deleted' => 'no']);
        $konsul_diproses = KonsultasiModel::factory()->create(['status' => 'Sedang diproses', 'created_at' => now(), 'is_deleted' => 'no']);
        $konsul_butuhfeedback = KonsultasiModel::factory()->create(['status' => 'Butuh feedback', 'created_at' => now(), 'is_deleted' => 'no']);
        $konsul_terkirim = KonsultasiModel::factory()->create(['status' => 'Terkirim', 'created_at' => now(), 'is_deleted' => 'no']);
        $konsultasi = KonsultasiModel::factory()->create();

        // Make a request to the index route
        $response = $this->withoutMiddleware()->get(route('rekap.konsul'));
        
        // Ambil data view
        $konsul_selesai = $response->viewData('konsul_selesai');
        $konsul_diproses = $response->viewData('konsul_diproses');
        $konsul_butuhfeedback = $response->viewData('konsul_butuhfeedback');
        $konsul_terkirim = $response->viewData('konsul_terkirim');
        $konsultasi = $response->viewData('konsultasi');
        
        // Assertions
        $response->assertStatus(200);
        $response->assertViewIs('admin.konsultasi.rekap_konsultasi');
    }

    public function test_cetakPdf()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        // Buat data mock konsultasi
        $konsul_selesai = KonsultasiModel::factory()->create(['status' => 'Selesai', 'created_at' => now(), 'is_deleted' => 'no']);
        $konsul_diproses = KonsultasiModel::factory()->create(['status' => 'Sedang diproses', 'created_at' => now(), 'is_deleted' => 'no']);
        $konsul_butuhfeedback = KonsultasiModel::factory()->create(['status' => 'Butuh feedback', 'created_at' => now(), 'is_deleted' => 'no']);
        $konsul_terkirim = KonsultasiModel::factory()->create(['status' => 'Terkirim', 'created_at' => now(), 'is_deleted' => 'no']);

        // Buat permintaan ke metode cetakPdf
        $response = $this->withoutMiddleware()->get(route('cetak.rekap.konsul'));

        // Assertions
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');

        // Memastikan respons tidak kosong
        $this->assertNotEmpty($response->getContent());
    }
}