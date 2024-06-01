<?php

namespace Tests\Unit\Konsultasi;

use App\Models\Konsultasi\BalasanKonsultasiModel;
use App\Models\Konsultasi\KonsultasiModel;
use App\Models\User;
use Tests\TestCase;

class KonsultasiAdminTest extends TestCase
{
    public function test_index_admin()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Arrange: Buat beberapa entri dalam KonsultasiModel
        $konsultasi = KonsultasiModel::create([
            'user_id' => 11,
            'subjek' => 'Akun SPSE',
            'isi' => 'Bagaimana cara mendaftar akun SPSE?',
            'attachment' => 'jadwal sempro.pdf',
            'status' => 'Terkirim',
            'is_deleted' => 'no',
            'created_at' => now()->subDays(2),
        ]);

        $response = $this->get('daftar konsultasi admin');

        $response->assertViewHas('admin_konsul', function ($admin_konsul) {
            return $admin_konsul->every(fn ($konsul) => $konsul->is_deleted === 'no');
        });

        // Periksa urutan data berdasarkan created_at
        $admin_konsul = $response->original->getData()['admin_konsul'];
        $this->assertTrue($admin_konsul->first()->is($konsultasi));
    }

    public function test_create_balasan()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $balasan = KonsultasiModel::factory()->create();

        // Memanggil metode user_create_balas dengan id konsultasi yang baru dibuat
        $response = $this->get("create balasan{$balasan->id}");

        // Memeriksa bahwa halaman telah berhasil dimuat
        $response->assertStatus(200);

        // Memeriksa bahwa variabel user_balas telah dikirimkan ke tampilan
        $response->assertViewHas('balasan', $balasan);
    }

    public function test_store_balasan()
    {
        // Create a user for authentication
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel entry
        $konsultasi = KonsultasiModel::factory()->create();

        // Mock request data
        $requestData = [
            'balasan' => 'ini pesan balasan dari admin',
            'status' => 'Butuh feedback', // You need to replace this with a valid status value
        ];

        // Make request to store_balasan method
        $response = $this->withoutMiddleware()->post(route('store.balas.admin', ['konsul_id' => $konsultasi->id]), $requestData);

        // Assert that the response redirects to the correct route
        $response->assertRedirect(route('daftar.konsul.admin'));

        // Assert that the BalasanKonsultasiModel entry is created with correct data
        $this->assertDatabaseHas('balasan_konsultasi', [
            'user_id' => $user->id,
            'konsul_id' => $konsultasi->id,
            'balasan' => $requestData['balasan'],
        ]);
    }

    public function test_show_status()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel entry
        $konsultasi = KonsultasiModel::factory()->create();

        // Make request to konsul_show_status method
        $response = $this->withoutMiddleware()->get(route('show.balas.status', ['konsul_id' => $konsultasi->id]));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the correct view is returned
        $response->assertViewIs('admin.konsultasi.show_admin_konsul');

        // Assert that the user_konsul is passed to the view correctly
        $response->assertViewHas('user_konsul', $konsultasi);

        // Assert that the admin_konsul is passed to the view correctly
        $response->assertViewHas('admin_konsul');

        // Assert that the status of the KonsultasiModel entry is updated correctly
        $this->assertEquals('Sedang diproses', KonsultasiModel::find($konsultasi->id)->status);
    }

    public function test_konsul_show()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel entry
        $konsultasi = KonsultasiModel::factory()->create();

        // Make request to konsul_show method
        $response = $this->withoutMiddleware()->get(route('show.balas.admin', ['konsul_id' => $konsultasi->id]));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the correct view is returned
        $response->assertViewIs('admin.konsultasi.show_admin_konsul');

        // Assert that the user_konsul is passed to the view correctly
        $response->assertViewHas('user_konsul', $konsultasi);

        // Assert that the admin_konsul is passed to the view correctly
        $response->assertViewHas('admin_konsul');
    }

    public function test_status_update()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel entry
        $konsultasi = KonsultasiModel::factory()->create();

        // Mock request data
        $requestData = [
            'status' => 'Selesai', // You need to replace this with a valid status value
        ];

        // Make request to status_update method
        $response = $this->withoutMiddleware()->put(route('status.update', ['konsul_id' => $konsultasi->id]), $requestData);

        // Assert that the response redirects to the correct route
        $response->assertRedirect(route('daftar.konsul.admin'));

        // Assert that the status of the KonsultasiModel entry is updated correctly
        $this->assertEquals($requestData['status'], KonsultasiModel::find($konsultasi->id)->status);
    }

    public function test_hapus_konsultasi_admin()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a KonsultasiModel instance
        $konsultasi = KonsultasiModel::factory()->create();

        // Create related BalasanKonsultasiModel instances
        $balasan = BalasanKonsultasiModel::factory()->create(['konsul_id' => $konsultasi->id]);

        // Make a DELETE request to destroy the konsultasi
        $response = $this->withoutMiddleware()->get(route('hapus.konsul.user', $konsultasi->id));

        // Check that the page redirects correctly
        $response->assertRedirect(route('daftar.konsul.user'));

        // Check that the KonsultasiModel instance is marked as deleted
        $this->assertDatabaseHas('konsultasi', [
            'id' => $konsultasi->id,
            'is_deleted' => 'yes',
        ]);

        // Check that the related BalasanKonsultasiModel instances are marked as deleted
        $this->assertDatabaseHas('balasan_konsultasi', [
            'id' => $balasan->id,
            'is_deleted' => 'yes',
        ]);
    }
}