<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Login()
    {


        $response = $this->call('POST', '/login',[
            'email' => 'sfsfs',
            'password' => '123456',
            ]);
        dd($response);
        $response->assertStatus($response->status(), 302);

//            $this->assertTrue(true);

    }

}
