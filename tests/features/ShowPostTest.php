<?php


class ShowPostTest extends FeatureTestCase
{
    
    function test_a_user_can_see_the_post_details()
    {
    	// Having
    	$user = $this->defaultUser([
    		'name' => 'Stiven Castillo'
    	]);

    	$post = factory(\App\Post::class)->make([
    		'title' => 'Titulo del post',
    		'content' => 'Descripcion del post'
    	]);

    	$user->posts()->save($post);

    	// When
    	$this->visit($post->url)
    		->seeInElement('h1', $post->title)
    		->see($post->content)
    		->see($user->name);
    }
}
