<?php

namespace Tests\Unit\Pengaduan;

use App\Models\User;
use App\Models\PengaduanModel;
use Tests\TestCase;
use PDF;

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
            'balasan' => 'Ini adalah balasan dari admin.',
            'status' => 'Selesai',
        ];

        // Melakukan request ke metode store_balasan
        $response = $this->withoutMiddleware()->post(route('store.balaspengaduan.admin', ['id' => $pengaduan->id]), $requestData);

        // Memastikan bahwa pengaduan telah diupdate dengan benar
        $this->assertEquals($requestData['balasan'], $pengaduan->refresh()->balasan);
        $this->assertEquals($requestData['status'], $pengaduan->refresh()->status);
        
        // Memastikan pesan sukses ditampilkan
        $response->assertSessionHas('success', 'Balasan anda berhasil dikirim!');

        // Memastikan pengguna diarahkan kembali ke daftar pengaduan
        $response->assertRedirect(route('daftar.pengaduan.admin'));
    }

}