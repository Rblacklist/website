<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    protected $jsonHeaders = ['Content-Type' => 'application/json', 'Accept' => 'application/json'];

    /** @test */
    function a_user_can_register_an_account()
    {
        $user = User::factory()->make();
        $data = [-
            'email' => $user->email,
            'password' => 'password',
            'name' => $user->name,
        ];

        $response = $this->post('/api/v1/register', $data);

        $response->assertStatus(200)->assertJson(['message' => 'Yay! A user has been successfully created.']);
    }


    /** @test */
    public function testRegister()
    {
        $response = $this->post('/api/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

    /** @test */
    public function testLogin()
    {
        $response = $this->post('/api/login', [
            'email' => 'testuser@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

    /** @test */
    public function testLogout()
    {
        $user = factory(User::class)->create();

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->post('/api/logout', [], $headers);

        $response->assertStatus(200)->assertJson(['message' => 'Successfully logged out']);
    }

    /** @test */
    public function testVerifyEmail()
    {
        $response = $this->post('/api/email/verify', [
            'email' => 'testuser@example.com',
        ]);

        $response->assertStatus(200)->assertJson(['message' => 'Verification link sent']);
    }
}
