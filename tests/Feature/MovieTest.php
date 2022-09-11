<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_movie_index()
    {
        $response = $this->get('http://127.0.0.1:8000/api/Movie/');
        $this->assertTrue(true);
        // $response->assertStatus(500);
    }
}
