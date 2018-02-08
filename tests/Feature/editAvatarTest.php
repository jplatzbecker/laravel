<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class editAvatarTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_update_his_own_avatar()
    {
        $user = factory('App\User')->create();
        $this->be($user);

        //$newAvatar = "datavatar.jpg";
        //$user = $this->faker->username;
        $fakeUsername = $this->faker->username;
        $fakeEmail = $this->faker->email;
        $request = ['name' => $fakeUsername, 'email' => $fakeEmail, 'avatar' => $this->faker->image('public/uploads/avatars', 300, 300, null, false)];

        $this->post('/user/edit/profile', $request);
        //dd($request);
        $this->get('/user/edit/profile')
            ->assertSee($request['name'])
            ->assertSee($request['avatar'])
            ->assertSee($request['email']);

    }
}
