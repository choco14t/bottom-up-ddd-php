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
     * A basic test example.
     *
     * @return void
     */
    public function testDuplicateFail()
    {
        $repository = new InMemoryUserRepository();
        $userName = new UserName('ttaro');
        $fullName = new FullName('taro', 'tanaka');
        $repository->save(new User($userName, $fullName));

        $app = new UserApplication($repository);
        $registered = false;

        try {
            $app->registerUser('ttaro', 'taro', 'tanaka');
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'Duplicate') >= 0) {
                $registered = true;
            }
        }

        $this->assertTrue($registered);
    }
}
