<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class editAvatarTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function update()
    {
        $this->assertTrue(true);
    }
}
