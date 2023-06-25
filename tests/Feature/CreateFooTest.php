<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory;


class CreateFooTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_that_new_foo_is_created(): void
    {
        $route = route('foos.store');
        $body = ['bar' => 'yellow',
            'happiness' => 20];

        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->post($route,$body );

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('foos', [
           'bar' => 'yellow'
        ]);
    }

    public function test_that_error_occurred_when_validation_fails() {
        $route = route('foos.store');

        $body = [
            'happiness' => "I am not happy at all"
        ];
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->post($route, $body);

        $response->assertSessionHasErrors(['bar', 'happiness']);
    }
}
