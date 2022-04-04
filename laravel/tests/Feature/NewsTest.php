<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_status_success()
    {
        $response = $this->get(route('welcome'));

        $response->assertStatus(200);
    }



    public function test_news_status_success()
    {
        $response = $this->get('news/Politics');

        $response->assertStatus(200);
    }

    public function test_one_news_show_status_success()
    {
        $response = $this->get('news/Politics/1');

        $response->assertStatus(200);
    }



    public function test_review_status_success()
    {
        $data = [
            'name'=>'some name',
            'email'=>'some email',
            'description'=>'some description'
        ];
        $response = $this->post(route('news.store'), $data);

        $response->assertJson($data)
                 ->assertCreated();
    }


}
