<?php

namespace Tests\Unit;

use App\Models\Foo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class FooCrudModelsViewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_create_returns_create(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user);
        $response = $this->get(route('foos.create'));
        $response->assertViewIs('foos.create');
    }

    public function test_that_edit_returns_edit(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user);
        $response = $this->get(route('foos.index'));
        $response->assertViewIs('foos.index');
    }

    public function test_that_eidt_returns_edit(): void
    {
        $user = User::factory()->create();
        $foo = Foo::factory()->create();

        $response = $this->actingAs($user);
        $response = $this->get(route('foos.edit', $foo));
        $response->assertViewIs('foos.edit');
    }
}
