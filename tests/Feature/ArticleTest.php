<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_see_title(){
        $attribute = [
            'title'=> 'required'
        ];
        $this->get('/articles')->assertSee($attribute['title']);
    }

    public function test_a_user_can_create_article()
    { 
        $this->withoutExceptionHandling();
       $attribute = [
           'title'=> $this->faker->sentence,
           'body'=> $this->faker->paragraph
       ];
       $this->post('/articles',$attribute)->assertRedirect('/articles');
       $this->assertDatabaseHas('articles',$attribute);
    }

    public function test_article_title_required(){
    // $this->withoutExceptionHandling();
     $attribute = factory('App\Article')->raw(['title'=>'']);
     $this->post('/articles',$attribute)->assertSessionHasErrors('title');
    }

    public function test_article_body_required(){
        // $this->withoutExceptionHandling();
         $attribute = factory('App\Article')->raw(['body'=>'']);
         $this->post('/articles',$attribute)->assertSessionHasErrors('body');
     }

    public function test_a_user_can_view_article(){
        $this->withoutExceptionHandling();
        $article = factory('App\Article')->create();
        $this->get($article->path())
        ->assertSee($article->title)
        ->assertSee($article->body);
    }

   
   
   

}
