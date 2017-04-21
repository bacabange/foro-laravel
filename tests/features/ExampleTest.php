<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * Refresh database
     */
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $name = 'Stiven';
        $user = factory(App\User::class)->create(['name' => $name]);

        $this->actingAs($user, 'api')
            ->visit('api/user')
            ->see($name);
    }
}
