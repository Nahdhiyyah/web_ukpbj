<?php

namespace Tests\Unit\Pengaduan;

use App\Models\PengaduanModel;
use App\Models\User;
use Tests\TestCase;

class PengaduanAdminTest extends TestCase
{
    public function test_index_admin()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Arrange: Buat beberapa entri dalam KonsultasiModel
        $pengaduan = PengaduanModel::factory()->create();

        $response = $this->withoutMiddleware()->get('daftar pengaduan admin');

        $response->assertViewHas('admin_pengaduan', function ($admin_pengaduan) {
            return $admin_pengaduan->every(fn ($pengaduan) => $pengaduan->is_deleted === 'no');
        });

        // Periksa urutan data berdasarkan created_at
        $admin_pengaduan = $response->original->getData()['admin_pengaduan'];
        $this->assertTrue($admin_pengaduan->first()->is($pengaduan));
    }

    public function test_create_balasan()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $balasan = PengaduanModel::factory()->create();

        $response = $this->get("buat balasan pengaduan{$balasan->id}");

        $response->assertStatus(200);

        $response->assertViewHas('balasan', $balasan);
    }

    public function test_store_balasan()
    {
        // Membuat pengguna (user) dan memasukkannya ke dalam autentikasi
        $user = User::factory()->create();
        $this->actingAs($user);

        // Membuat data pengaduan
        $pengaduan = PengaduanModel::factory()->create();

        // Membuat data request
        $requestData = [
            'user_id_petugas' => $user->id,
            'balasan' => 'Ini adalah balasan dari admin.',
            'status' => 'Selesai',
        ];

        // Melakukan request ke metode store_balasan
        $response = $this->withoutMiddleware()->post(route('store.balaspengaduan.admin', ['id' => $pengaduan->id]), $requestData);

        // Memastikan bahwa pengaduan telah diupdate dengan benar
        $this->assertEquals($requestData['balasan'], $pengaduan->refresh()->balasan);
        $this->assertEquals($requestData['status'], $pengaduan->refresh()->status);

        // Memastikan pengguna diarahkan kembali ke daftar pengaduan
        $response->assertRedirect(route('daftar.pengaduan.admin'));
    }

    public function test_pengaduan_show_status()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel entry
        $pengaduan = PengaduanModel::factory()->create();

        // Make request to konsul_show_status method
        $response = $this->withoutMiddleware()->get(route('show.balaspengaduan.status', ['id' => $pengaduan->id]));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the correct view is returned
        $response->assertViewIs('admin.pengaduan.show_admin_pengaduan');

        // Assert that the user_konsul is passed to the view correctly
        $response->assertViewHas('pengaduan', $pengaduan);

        // Assert that the status of the KonsultasiModel entry is updated correctly
        $this->assertEquals('Sedang diproses', PengaduanModel::find($pengaduan->id)->status);
    }

    public function test_pengaduan_show()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel entry
        $pengaduan = PengaduanModel::factory()->create();

        // Make request to konsul_show method
        $response = $this->withoutMiddleware()->get(route('show.balaspengaduan.admin', ['id' => $pengaduan->id]));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the correct view is returned
        $response->assertViewIs('admin.pengaduan.show_admin_pengaduan');

        // Assert that the user_konsul is passed to the view correctly
        $response->assertViewHas('pengaduan', $pengaduan);
    }

    public function test_status_update()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        // Buat pengaduan baru untuk pengujian
        $pengaduan = PengaduanModel::factory()->create();

        // Data yang akan dikirim dalam permintaan update
        $updateData = [
            'status' => 'Selesai',
        ];

        // Buat permintaan PUT ke endpoint update
        $response = $this->withoutMiddleware()->put(route('statuspengaduan.update', $pengaduan->id), $updateData);

        // Periksa apakah permintaan berhasil
        $response->assertRedirect(url()->previous()); // Pastikan diarahkan kembali

        // Periksa apakah data di database sudah terupdate
        $this->assertDatabaseHas('pengaduan', [
            'id' => $pengaduan->id,
            'status' => 'Selesai', // Status seharusnya sudah berubah
        ]);
    }

    public function test_hapus_pengaduan_admin()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a PengaduanModel instance
        $pengaduan = PengaduanModel::factory()->create();

        // Make a DELETE request to destroy the pengaduan
        $response = $this->withoutMiddleware()->get(route('hapus.pengaduan.admin', $pengaduan->id));

        // Check that the page redirects correctly
        $response->assertRedirect(route('daftar.pengaduan.admin'));

        // Check that the KonsultasiModel instance is marked as deleted
        $this->assertDatabaseHas('pengaduan', [
            'id' => $pengaduan->id,
            'is_deleted' => 'yes',
        ]);
    }
}