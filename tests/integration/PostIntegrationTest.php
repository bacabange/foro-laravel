<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostIntegrationTest extends TestCase
{

	use DatabaseTransactions;

    function test_a_slug_is_generated_and_saved_to_the_database()
    {
    	$user = $this->defaultUser();

    	$post = factory(\App\Post::class)->make([
    		'title' => 'Como Instalar Laravel'
    	]);

    	$user->posts()->save($post);

    	/*$this->seeInDatabase('posts', [
    		'slug' => 'como-instalar-laravel'
    	]);*/

    	$this->assertSame('como-instalar-laravel', $post->slug);

    	// $this->assertSame('como-instalar-laravel', $post->fresh()->slug);
    }
}
