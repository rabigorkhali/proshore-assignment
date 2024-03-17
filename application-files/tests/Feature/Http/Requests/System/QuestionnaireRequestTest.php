<?php

namespace Tests\Unit\Http\Requests\System;

use App\Http\Requests\System\questionnaireRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionnaireRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testAuthorize()
    {
        $questionnaireRequest = new questionnaireRequest();

        $this->assertTrue($questionnaireRequest->authorize());
    }

    public function testValidationRules()
    {
        $questionnaireRequest = new questionnaireRequest();
        $request = $this->createRequest();

        $rules = $questionnaireRequest->rules($request);

        $this->assertArrayHasKey('title', $rules);
        $this->assertArrayHasKey('expiry_date', $rules);
        $this->assertEquals('required|string|max:255|min:4', $rules['title']);
        $this->assertEquals('date|required|after:today', $rules['expiry_date']);
    }

    private function createRequest()
    {
        $request = new \Illuminate\Http\Request();

        // You can add any required attributes to the request here
        $request->merge([
            'title' => $this->faker->sentence,
            'expiry_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        ]);

        return $request;
    }
}
