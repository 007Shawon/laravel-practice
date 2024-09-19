<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\BlogPost;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNoBlogPostWhenNothingInDatabase()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No Posts Found! So Sad');
    }
    public function testSee1BlogPostWhenThereIs1()
    {
        //Arrange
        $post = new BlogPost();
        $post->title = 'New Title';
        $post->content = "Content of the blog post";
        $post->save();

        $response = $this->get('/posts');

        $response->assertSeeText('New Title');

        $this->assertDatabaseHas('blog_posts',[
            'title' => 'New Title'
        ]);
    }

    public function testStoreValid(){
        $params = [
            'title'=> 'Valid title',
            'content' => 'At least 10 characters'
            ];
       $this->post('/posts',$params)
         ->assertStatus(302)
         ->assertSessionHas('status');

       $this->assertEquals(session('status'),'The post is successfully created!');

    }
    public function testStoreFail(){
        $params = [
            'title'=> 'x',
            'content' => 'x'
        ];
        $this->post('/posts',$params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors');
        $this->assertEquals($messages['title'][0],'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0],'The content must be at least 10 characters.');

    }
}
