<?php

class PostModelTest extends TestCase
{

    function test_adding_a_title_generates_a_slug()
    {
    	$post = new \App\Post([
    		'title' => 'Como instalar Laravel'
    	]);

    	$this->assertSame('como-instalar-laravel', $post->slug);
    }

    function test_editing_the_title_changes_the_slug()
    {
    	$post = new \App\Post([
    		'title' => 'Como instalar Laravel'
    	]);

    	$post->title = "Como instalar Laravel 5.1 LTS";

    	$this->assertSame('como-instalar-laravel-51-lts', $post->slug);
    }

    function test_responsing_the_url_post()
    {
        $user = $this->defaultUser([
            'name' => 'Stiven Castillo'
        ]);

        $post = factory(\App\Post::class)->make([
            'title' => 'Instalar Laravel'
        ]);

        $user->posts()->save($post);

        $this->assertSame(url('posts/' . $post->id . '-instalar-laravel'), $post->url);

    }
}
