<?php

namespace Tests\Unit\Http\Requests\System;

use App\Http\Requests\System\userRequest;
use App\Rules\system\UniqueCaseSenstiveValidation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testAuthorize()
    {
        $userRequest = new userRequest();

        $this->assertTrue($userRequest->authorize());
    }

    public function testValidationRulesForPost()
    {
        $userRequest = new userRequest();
        $request = $this->createRequest('POST');

        $rules = $userRequest->rules($request);

        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('email', $rules);
        $this->assertArrayHasKey('password', $rules);
        $this->assertArrayHasKey('password_confirmation', $rules);
        $this->assertIsArray($rules['email']);
        $this->assertInstanceOf(UniqueCaseSenstiveValidation::class, $rules['email'][3]);
    }

    public function testValidationRulesForPut()
    {
        $userRequest = new userRequest();
        $request = $this->createRequest('PUT');

        $rules = $userRequest->rules($request);

        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('email', $rules);
        $this->assertIsArray($rules['email']);
        $this->assertInstanceOf(UniqueCaseSenstiveValidation::class, $rules['email'][3]);
    }

    private function createRequest($method)
    {
        $request = new \Illuminate\Http\Request();
        $request->setMethod($method);

        return $request;
    }
}
