<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    /**
     * User register test
     *
     * @return void
     */
    public function test_register()
    {
        $user = User::factory()->make();
        $this->assertNotEmpty($user);
    }
}
