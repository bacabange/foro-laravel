<?php


class CreatePostsTest extends FeatureTestCase
{

    function test_a_user_create_a_post()
    {
        // Having/Teniendo
        $title = 'Esta es una pregunta';
        $content = 'Este es el contenido';

        $this->actingAs($user = $this->defaultUser());

        // When/Cuando
        $this->visit(route('posts.create'))
            ->type($title, 'title')
            ->type($content, 'content')
            ->press('Publicar');

        // Then/Entonces
        $this->seeInDatabase('posts', [
            'title' => $title,
            'content' => $content,
            'prending' => true,
            'user_id' => $user->id
        ]);

        $this->see($title);
    }

    function test_creating_a_post_requires_authentication()
    {
        $this->visit(route('posts.create'))
            ->seePageIs(route('login'));
        
    }

    /*function test_a_guest_user_tries_to_create_a_post()
    {
        // Having/Teniendo
        $title = 'Esta es una pregunta';
        $content = 'Este es el contenido';

        // When/Cuando
        $this->visit(route('posts.create'))
            ->type($title, 'title')
            ->type($content, 'content')
            ->press('Publicar');

        // Then/Entonces
        $this->seeInDatabase('posts', [
            'title' => $title,
            'content' => $content,
            'prending' => true,
            'user_id' => $user->id
        ]);

        $this->see($title);
    }*/
}
