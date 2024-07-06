<?php

namespace Tests\Unit\Pengaduan;

use App\Models\PengaduanModel;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PengaduanMasyarakatTest extends TestCase
{
    public function test_index_user()
    {
        $user = User::factory()->create();
        // Menyimulasikan pengguna yang diautentikasi
        $this->actingAs($user);

        // Arrange: Buat beberapa entri dalam KonsultasiModel
        $pengaduan = PengaduanModel::factory()->create();

        $response = $this->withoutMiddleware()->get(route('daftar.pengaduan.user'));
        $response->assertViewIs('user.pengaduan.index_user_pengaduan');
        $response->assertViewHas('user_pengaduan');

        $viewPengaduan = $response->viewData('user_pengaduan');
    }

    public function test_create_pengaduan()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('create.pengaduan.user'));
        $response->assertStatus(200);
        $response->assertViewIs('user.pengaduan.create_user_pengaduan');
    }

    public function test_store_pengaduan()
    {
        // Simulasi penyimpanan file
        Storage::fake('public');

        // Membuat pengguna dan mengotentikasi
        $user = User::factory()->create();
        $this->actingAs($user);

        // File yang akan diunggah
        $file = UploadedFile::fake()->create('attachment.jpg');

        // Data untuk permintaan
        $data = [
            'judul' => 'Subjek Tes dengan Lampiran',
            'isi' => 'Isi dari pengaduan dengan lampiran.',
            'attachment' => $file,
        ];

        // Melakukan permintaan POST ke rute user_store tanpa middleware
        $response = $this->withoutMiddleware()->post(route('store.pengaduan.user'), $data);

        // Memeriksa bahwa pengguna dialihkan ke rute yang diharapkan
        $response->assertRedirect(route('daftar.pengaduan.user'));

        // Memeriksa bahwa konsultasi dibuat di database
        $this->assertDatabaseHas('pengaduan', [
            'user_id' => $user->id,
            'user_id_petugas' => null,
            'judul' => $data['judul'],
            'isi' => $data['isi'],
            'attachment' => 'attachment.jpg',
        ]);

        // Memeriksa bahwa file diunggah ke penyimpanan yang tepat
        Storage::assertExists('public/pengaduan/attachment.jpg');
    }

    public function test_user_show_pengaduan()
    {
        // Buat user dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Buat konsultasi dan balasan
        $pengaduan = PengaduanModel::factory()->create();

        // Panggil metode user_show
        $response = $this->withoutMiddleware()->get(route('show.pengaduan.user', $pengaduan->id));

        // Periksa bahwa halaman telah berhasil dimuat
        $response->assertStatus(200);

        // Periksa bahwa data konsultasi dikirimkan ke tampilan
        $response->assertViewHas('user_pengaduan', $pengaduan);
    }

    public function test_hapus_pengaduan_user()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel instance
        $pengaduan = PengaduanModel::factory()->create();

        // Make a DELETE request to destroy the konsultasi
        $response = $this->withoutMiddleware()->get(route('hapus.pengaduan.user', $pengaduan->id));

        // Check that the page redirects correctly
        $response->assertRedirect(route('daftar.pengaduan.user'));

        // Check that the KonsultasiModel instance is marked as deleted
        $this->assertDatabaseHas('pengaduan', [
            'id' => $pengaduan->id,
            'is_deleted' => 'yes',
        ]);
    }
}