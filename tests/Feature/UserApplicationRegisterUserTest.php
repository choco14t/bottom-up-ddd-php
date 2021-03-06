<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use BottomUpDDD\InMemoryInfrastructure\InMemoryUserRepository;
use BottomUpDDD\Domain\Users\UserName;
use BottomUpDDD\Domain\Users\FullName;
use BottomUpDDD\Domain\Users\User;
use BottomUpDDD\Domain\Application\UserApplication;

class UserApplicationRegisterUserTest extends TestCase
{
    /**
     * @expectedException Exception
     */
    public function testDuplicateFail()
    {
        $repository = new InMemoryUserRepository();
        $userName = new UserName('ttaro');
        $fullName = new FullName('taro', 'tanaka');
        $repository->save(new User($userName, $fullName));

        $app = new UserApplication($repository);
        $registered = false;

        $app->registerUser('ttaro', 'taro', 'tanaka');
    }

    public function testRegister()
    {
        $repository = new InMemoryUserRepository();
        $app = new UserApplication($repository);
        $app->registerUser('ttaro', 'taro', 'tanaka');

        $user = $repository->findByUserName(new UserName('ttaro'));
        $this->assertNotNull($user);
        $this->assertFalse($user->id()->value() === '1');
    }
}
