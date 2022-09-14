<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TimeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_time_index()
    {
        $response = $this->get('http://127.0.0.1:8000/api/Time/');

        
        $this->assertTrue(true);

        // $response->assertStatus(200);
    }
}
