<?php

namespace Tests\Unit;

use App\Models\Foo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FooIsHappyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_that_foo_is_happy(): void
    {
        $foo = Foo::factory()->create([
            'happiness' => 24
        ]);

        $this->assertTrue($foo->isHappy());
    }

    public function test_that_foo_is_not_happy(): void
    {
        $foo = Foo::factory()->create([
            'happiness' => 2
        ]);

        $this->assertFalse($foo->isHappy());
    }
}
