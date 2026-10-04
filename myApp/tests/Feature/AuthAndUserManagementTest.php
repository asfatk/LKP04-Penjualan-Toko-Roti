<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\OwnerSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthAndUserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_owner_can_log_in_and_reaches_owner_dashboard(): void
    {
        $owner = User::factory()->create([
            'username' => 'bakery-owner',
            'password' => 'secret-pass',
            'role' => 'owner',
        ]);

        $this->post(route('login.process'), [
            'username' => 'bakery-owner',
            'password' => 'secret-pass',
        ])->assertRedirect(route('owner.dashboard'));

        $this->assertAuthenticatedAs($owner);
    }

    public function test_owner_seeder_creates_one_hashed_owner_account(): void
    {
        $this->seed(OwnerSeeder::class);
        $this->seed(OwnerSeeder::class);

        $owner = User::where('username', 'owner')->firstOrFail();

        $this->assertSame(1, User::where('username', 'owner')->count());
        $this->assertSame('owner', $owner->role);
        $this->assertTrue(Hash::check(env('OWNER_INITIAL_PASSWORD', 'password'), $owner->password));
    }

    public function test_owner_can_create_a_cashier_account(): void
    {
        $owner = User::factory()->create(['role' => 'owner']);

        $this->actingAs($owner)
            ->get(route('owner.users'))
            ->assertOk()
            ->assertSee('Manajemen pengguna');

        $this->actingAs($owner)
            ->get(route('owner.users.create'))
            ->assertOk()
            ->assertSee('Tambah pengguna');

        $this->actingAs($owner)->post(route('owner.users.store'), [
            'nama' => 'Kasir Pagi',
            'username' => 'kasir-pagi',
            'role' => 'kasir',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect(route('owner.users'));

        $this->assertDatabaseHas('users', [
            'nama' => 'Kasir Pagi',
            'username' => 'kasir-pagi',
            'role' => 'kasir',
        ]);

        $cashier = User::where('username', 'kasir-pagi')->firstOrFail();

        $this->actingAs($owner)
            ->get(route('owner.users.edit', $cashier))
            ->assertOk()
            ->assertSee('Edit pengguna');

        $this->actingAs($owner)
            ->put(route('owner.users.update', $cashier), [
                'nama' => 'Kasir Sore',
                'username' => 'kasir-sore',
                'role' => 'admin',
            ])
            ->assertRedirect(route('owner.users'));

        $this->assertDatabaseHas('users', [
            'id' => $cashier->id,
            'nama' => 'Kasir Sore',
            'username' => 'kasir-sore',
            'role' => 'admin',
        ]);

        $this->actingAs($owner)
            ->delete(route('owner.users.destroy', $cashier))
            ->assertRedirect(route('owner.users'));

        $this->assertDatabaseMissing('users', ['id' => $cashier->id]);
    }

    public function test_admin_cannot_open_owner_user_management(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get(route('owner.users'))
            ->assertForbidden();
    }

    public function test_guest_is_redirected_to_login_from_owner_dashboard(): void
    {
        $this->get(route('owner.dashboard'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_owner_dashboard_renders(): void
    {
        $owner = User::factory()->create(['role' => 'owner']);

        $this->actingAs($owner)
            ->get(route('owner.dashboard'))
            ->assertOk()
            ->assertSee('Pengelolaan pengguna')
            ->assertSee(route('home'));
    }
}
