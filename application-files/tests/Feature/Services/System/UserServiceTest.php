<?php

namespace Tests\Unit\Services\System;

use App\Exceptions\NotDeletableException;
use App\Repositories\System\UserRepository;
use App\Services\System\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    private $userService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->userService = app(UserService::class);
    }

    /** @test */
    public function it_can_return_index_page_data()
    {
        $userRepositoryMock = $this->createMock(UserRepository::class);
        $userService = new UserService($userRepositoryMock);
        $request = new Request();
        $result = $userService->indexPageData($request);
        $this->assertArrayHasKey('items', $result);
    }

    /** @test */
    public function testCanStoreUserToDatabase(): void
    {
        $requestData = [
            'name' => 'Rabi',
            'email' => 'rabig@example.com',
            'password' => 'secret',
        ];

        $request = new Request($requestData);

        $storedUser = $this->userService->store($request);

        $this->assertDatabaseHas('users', [
            'id' => $storedUser->id,
            'name' => 'Rabi',
            'email' => 'rabig@example.com',
        ]);

        $this->assertTrue(Hash::check('secret', $storedUser->password));
    }

    /** @test */
    public function it_can_edit_page_data()
    {
        $userRepositoryMock = $this->createMock(UserRepository::class);
        $userService = new UserService($userRepositoryMock);
        $id = 1;

        $result = $userService->editPageData(new Request(), $id);

        $this->assertArrayHasKey('item', $result);
    }

    /** @test */
    public function it_throws_exception_when_deleting_not_deletable_user()
    {
        $this->expectException(NotDeletableException::class);
        $userRepositoryMock = $this->createMock(UserRepository::class);
        $userService = new UserService($userRepositoryMock);
        $id = 1;
        $userService->delete(new Request(), $id);
    }

    /** @test */
    public function it_can_find_user_by_email()
    {
        $userRepositoryMock = $this->createMock(UserRepository::class);
        $userService = new UserService($userRepositoryMock);
        $email = 'test@example.com';
        $user = $userService->findByEmail($email);
        $this->assertNull($user);
    }
}
