<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this
            ->actingAs($user)
             ->get('/admin/AkunTransaksi'); // Update path to include 'admin' prefix

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        $userId = $user->id;

        $response = $this
            ->actingAs($user)
            ->put(route('admin.AkunPenggunaupdate', ['id' => $userId]), [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'role' => 'admin',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/admin/AkunPengguna'); // Update redirect path
        $user->refresh();

        $this->assertSame('Test User', $user->name);
        $this->assertSame('test@example.com', $user->email);
        $this->assertInstanceOf(\Carbon\Carbon::class, $user->email_verified_at);
    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        $userId = $user->id;

        $response = $this
            ->actingAs($user)
             ->put(route('admin.AkunPenggunaupdate', ['id' => $userId]), [
                'name' => 'Test User',
                'email' => $user->email,
                'role' => 'admin',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/admin/AkunPengguna'); // Update redirect path

        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    public function test_user_can_delete_their_account(): void
    {
        $user = User::factory()->create(['role' => 'admin', 'password' => bcrypt('password')]); // Pastikan password terenkripsi
        $userId = $user->id;


        $response = $this
            ->actingAs($user)
            ->delete(route('admin.AkunPenggunadelete', ['id' => $userId]), [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/admin/AkunPengguna'); // Update redirect path

        $this->post(route('logout'));

        // Memastikan pengguna sudah dihapus dari database
        $this->assertNull(User::find($userId)); // Memastikan bahwa pengguna tidak ditemukan di database
            
        // Memastikan pengguna sudah logout
        $this->assertGuest();
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
       $user = User::factory()->create(['role' => 'admin', 'password' => bcrypt('password')]); // Pastikan password terenkripsi
        $userId = $user->id;

        $response = $this
            ->actingAs($user)
            ->from('/admin/AkunPengguna')
           ->delete(route('admin.AkunPenggunadelete', ['id' => $userId]), [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrors('password');

        $this->assertNotNull($user->fresh());
    }
}
