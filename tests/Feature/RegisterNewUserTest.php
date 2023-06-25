<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterNewUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_that_user_can_register(): void
    {
        $route = route('store');
        $userInfo = [
            'name' => 'Nobody',
            'email' => 'whoami@gmail.com',
            'password' => 'what_is_meaning_of_life',
            'password_confirmation' => 'what_is_meaning_of_life'
        ];

        $response = $this->post($route, $userInfo);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', [
            'name'=>'Nobody'
        ]);
    }

    public function test_that_users_passwords_does_not_match() {
        $route = route('store');
        $userInfo = [
            'name' => 'Nobody',
            'email' => 'whoami@gmail.com',
            'password' => 'what_is_meaning_of_life',
            'password_confirmation' => 'what_is_meaning_of_being_alive'
        ];

        $response = $this->post($route, $userInfo);
        $response->assertSessionHasErrors('password');
    }


    public function test_that_email_is_already_taken() {
        $existingUser = User::factory()->create();
        $route = route('store');
        $newUser = [
            'name' => 'Nobody',
            'email' => $existingUser->email,
            'password' => 'what_is_meaning_of_life',
            'password_confirmation' => 'what_is_meaning_of_being_alive'
        ];

        $response = $this->post($route, $newUser);
        $response->assertSessionHasErrors('email');
    }

    public function test_that_required_fields_are_empty() {
        $route = route('store');
        $newUser = [];

        $response = $this->post($route, $newUser);
        $response->assertSessionHasErrors(['name', 'password', 'email']);
    }
}
