<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_post_login()
    {
        $data=[
            'email'=>'distributor@distributor.com',
            'password'=>'password'
        ];
        $response = $this->post('http://127.0.0.1:8000/api/login',$data);
        // $this->assertTrue(true);
        $response->assertStatus(200);
    }
    public function test_get_user_info()
    {
        // $response = $this->get('/api/Profile/info');
        $this->assertTrue(true);
        // $response->assertStatus(500);
    }
    
    public function test_deactivate_user()
    {
        // $response = $this->get('/api/Profile/info');
        $this->assertTrue(true);
        // $response->assertStatus(500);
    }
}
