<?php

namespace Tests\Unit;

use Tests\TestCase;

class IdeaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Idea_store()
    {
        $response = $this->call(POST,'/ideas',[
            'title' => 'tuyen dung',
            'content' => 'ceo'
        ]);
        dd($response);
        $response->assertStatus($response->status(), 302);
//        $this->assertTrue(true);
    }
}
