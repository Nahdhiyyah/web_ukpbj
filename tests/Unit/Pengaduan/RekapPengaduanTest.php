<?php

namespace Tests\Unit\Pengaduan;

use App\Models\PengaduanModel;
use App\Models\User;
use Tests\TestCase;
use PDF;

class RekapPengaduanTest extends TestCase
{
    public function test_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create mock consultations
        $pengaduan_selesai = PengaduanModel::factory()->create(['status' => 'Selesai', 'created_at' => now(), 'is_deleted' => 'no']);
        $pengaduan_diproses = PengaduanModel::factory()->create(['status' => 'Sedang diproses', 'created_at' => now(), 'is_deleted' => 'no']);
        $pengaduan_terkirim = PengaduanModel::factory()->create(['status' => 'Terkirim', 'created_at' => now(), 'is_deleted' => 'no']);
        $pengaduan = PengaduanModel::factory()->create();

        // Make a request to the index route
        $response = $this->withoutMiddleware()->get(route('rekap.pengaduan'));
        
        // Ambil data view
        $pengaduan_selesai = $response->viewData('pengaduan_selesai');
        $pengaduan_diproses = $response->viewData('pengaduan_diproses');
        $pengaduan_terkirim = $response->viewData('pengaduan_terkirim');
        $pengaduan = $response->viewData('pengaduan');
        
        // Assertions
        $response->assertStatus(200);
        $response->assertViewIs('admin.pengaduan.rekap_pengaduan');
    }

    public function test_cetakPdf()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        // Buat data mock konsultasi
        $pengaduan_selesai = PengaduanModel::factory()->create(['status' => 'Selesai', 'created_at' => now(), 'is_deleted' => 'no']);
        $pengaduan_diproses = PengaduanModel::factory()->create(['status' => 'Sedang diproses', 'created_at' => now(), 'is_deleted' => 'no']);
        $pengaduan_terkirim = PengaduanModel::factory()->create(['status' => 'Terkirim', 'created_at' => now(), 'is_deleted' => 'no']);

        // Buat permintaan ke metode cetakPdf
        $response = $this->withoutMiddleware()->get(route('cetak.rekap.pengaduan'));

        // Assertions
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');

        // Memastikan respons tidak kosong
        $this->assertNotEmpty($response->getContent());
    }
}