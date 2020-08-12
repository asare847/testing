<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_has_path()
    {
        $articles = factory('App\Article')->create();
        $this->assertEquals('/articles/'.$articles->id,$articles->path());
    }
}
