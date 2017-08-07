<?php


class ShowPostTest extends FeatureTestCase
{
    
    function test_a_user_can_see_the_post_details()
    {
    	// Having
    	$user = $this->defaultUser([
    		'name' => 'Stiven Castillo'
    	]);

    	$post = $this->createPost([
    		'title' => 'Titulo del post',
    		'content' => 'Descripcion del post',
            'user_id' => $user->id
    	]);

    	// When
    	$this->visit($post->url)
    		->seeInElement('h1', $post->title)
    		->see($post->content)
    		->see($user->name);
    }


    function test_old_urls_are_redirected()
    {
        $post = $this->createPost([
            'title' => 'Old Title'
        ]);

        $url = $post->url;

        $post->update([
            'title' => 'New Title'
        ]);

        $this->visit($url)
            ->seePageIs($post->url)
            ->see('New Title');
    }
}
