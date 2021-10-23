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
    public function test_show_news_create_form()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function test_show_single_news()
    {
        $response = $this->get(route('news.show', ['id' => mt_rand(0,9)]));

        $response->assertStatus(200);
    }
    
    public function test_show_categories_view()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertViewIs('admin.categories.index');
    }

    public function test_all_news_render()
    {
        $response = $this->get(route('news.index'));

        $response->assertSuccessful();
    }



}
