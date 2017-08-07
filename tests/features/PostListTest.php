<?php

class PostListTest extends FeatureTestCase
{

    function test_a_user_can_see_the_post_list_and_go_to_the_details()
    {
    	$post = $this->createPost([
    		'title' => 'Maldito post'
    	]);

    	$this->visit('/')
    		->seeInElement('h1', 'Posts')
    		->see($post->title)
    		->click($post->title)
    		->seePageIs($post->url);
    }

    function test_the_posts_are_paginated()
    {
    	$first = factory(\App\Post::class)->create([
    		'title' => 'Post mas antiguo',
    		'created_at' => \Carbon\Carbon::now()->subDays(2)
    	]);

    	factory(\App\Post::class)->times(15)->create([
    		'created_at' => \Carbon\Carbon::now()->subDay()
    	]);

    	$last = factory(\App\Post::class)->create([
    		'title' => 'Post mas reciende'
    	]);

    	$this->visit('/')
    		->see($last->title)
    		->dontSee($first->title)
    		->click('2')
    		->see($first->title)
    		->dontSee($last->title);
    }
}
