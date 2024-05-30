<?php

namespace Tests\Unit;

use App\Models\Konsultasi\KonsultasiModel;
use App\Models\Konsultasi\BalasanKonsultasiModel;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KonsultasiTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    // use RefreshDatabase;

    public function test_index_user()
    {
        $data_konsul = [
            'user_id' => 11,
            'subjek' => 'Akun SPSE',
            'isi' => 'Bagaimana cara mendaftar akun SPSE?',
            'attachment' => 'jadwal sempro.pdf',
            'status' => 'Terkirim',
            'is_deleted' => 'no',
        ];

        // Act: Fetch the data from the database
        $konsultasi = KonsultasiModel::where($data_konsul)->first();

        // Assert: Check that the data is as expected
        $this->assertNotNull($konsultasi);
        $this->assertEquals($konsultasi->created_at, KonsultasiModel::orderBy('created_at', 'desc')->first()->created_at);
    }

    public function test_user_create()
    {
        $user = User::factory()->create();

        // Menyimulasikan pengguna yang diautentikasi
        $this->actingAs($user);

        // Melakukan permintaan ke rute yang ingin diuji
        $response = $this->get('/create-konsultasi');

        // Memeriksa bahwa respons memiliki status 200 OK
        $response->assertStatus(200);

        // Anda perlu mengikuti redirect dan memeriksa tampilan.
        $response->assertViewIs('user.konsultasi.create_user_konsul');
    }

    public function test_store_without_attachment()
    {
        // Membuat pengguna dan mengotentikasi
        $user = User::factory()->create();
        $this->actingAs($user);

        // Data untuk permintaan
        $data = [
            'subjek' => 'Pembuatan Akun SPSE',
            'isi' => 'Bagaimana prosedur pembuatan akun SPSE?',
        ];

        // Melakukan permintaan POST ke rute store.konsul.user tanpa middleware
        $response = $this->withoutMiddleware()->post(route('store.konsul.user'), $data);

        // Memeriksa bahwa pengguna dialihkan ke rute yang diharapkan
        $response->assertRedirect(route('daftar.konsul.user'));

        // Memeriksa bahwa konsultasi dibuat di database
        $this->assertDatabaseHas('konsultasi', [
            'user_id' => $user->id,
            'subjek' => 'Pembuatan Akun SPSE',
            'isi' => 'Bagaimana prosedur pembuatan akun SPSE?',
            'attachment' => null,
        ]);
    }

    public function test_store_with_attachment()
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
            'subjek' => 'Subjek Tes dengan Lampiran',
            'isi' => 'Isi dari konsultasi dengan lampiran.',
            'attachment' => $file,
        ];

        // Melakukan permintaan POST ke rute user_store tanpa middleware
        $response = $this->withoutMiddleware()->post(route('store.konsul.user'), $data);

        // Memeriksa bahwa pengguna dialihkan ke rute yang diharapkan
        $response->assertRedirect(route('daftar.konsul.user'));

        // Memeriksa bahwa konsultasi dibuat di database
        $this->assertDatabaseHas('konsultasi', [
            'user_id' => $user->id,
            'subjek' => 'Subjek Tes dengan Lampiran',
            'isi' => 'Isi dari konsultasi dengan lampiran.',
            'attachment' => 'attachment.jpg',
        ]);

        // Memeriksa bahwa file diunggah ke penyimpanan yang tepat
        Storage::assertExists('public/konsultasi/attachment.jpg');
    }

    public function test_user_create_balas()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $konsultasi = KonsultasiModel::factory()->create();

        // Memanggil metode user_create_balas dengan id konsultasi yang baru dibuat
        $response = $this->get("create user balas{$konsultasi->id}");

        // Memeriksa bahwa halaman telah berhasil dimuat
        $response->assertStatus(200);

        // Memeriksa bahwa variabel user_balas telah dikirimkan ke tampilan
        $response->assertViewHas('user_balas', $konsultasi);
    }

    public function test_store_balas()
    {
        // Membuat user dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Membuat konsultasi
        $konsultasi = KonsultasiModel::factory()->create();

        // Data request
        $requestData = [
            'balasan' => 'ini adalah contoh balasan',
        ];

        // Kirim request
        $response = $this->withoutMiddleware()->post(route('store.balas.user', $konsultasi->id), $requestData);

        // Memeriksa bahwa response redirect ke route yang benar
        $response->assertRedirect(route('daftar.konsul.user'));

        // Memeriksa bahwa balasan tersimpan di database
        $this->assertDatabaseHas('balasan_konsultasi', [
            'user_id' => $user->id,
            'konsul_id' => $konsultasi->id,
            'balasan' => $requestData['balasan'],
        ]);

        // Memeriksa bahwa status konsultasi diperbarui
        $this->assertDatabaseHas('konsultasi', [
            'id' => $konsultasi->id,
            'status' => 'Sedang diproses',
        ]);
    }

    public function test_user_show()
    {
        // Buat user dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Buat konsultasi dan balasan
        $konsultasi = KonsultasiModel::factory()->create();
        $balasan = BalasanKonsultasiModel::factory()->create(['konsul_id' => $konsultasi->id]);
        // $balasan2 = BalasanKonsultasiModel::factory()->create(['konsul_id' => $konsultasi->id]);

        // Panggil metode user_show
        $response = $this->withoutMiddleware()->get(route('show.konsul.user', $konsultasi->id));

        // Periksa bahwa halaman telah berhasil dimuat
        $response->assertStatus(200);

        // Periksa bahwa data konsultasi dikirimkan ke tampilan
        $response->assertViewHas('user_konsul', $konsultasi);

        // Periksa bahwa data balasan dikirimkan ke tampilan
        $response->assertViewHas('balasan');

        // Memeriksa bahwa tampilan berisi data yang diharapkan
        $response->assertSee($konsultasi->title);
        $response->assertSee($balasan->balasan);
        // $response->assertSee($balasan2->balasan);
    }
}