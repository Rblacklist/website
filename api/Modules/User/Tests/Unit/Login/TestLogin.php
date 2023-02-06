<?php

namespace Modules\User\Tests\Unit\Login;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestLogin extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_login()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'phoneOrEmail' => $user->phoneOrEmail,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home'));
 
        $this->assertEquals($user->email, session('email'));
    }
}
