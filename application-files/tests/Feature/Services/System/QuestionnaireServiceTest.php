<?php

namespace Tests\Feature\Services\System;

use App\Model\Question;
use App\Model\Student;
use App\Repositories\System\QuestionnaireRepository;
use App\Services\System\EmailService;
use App\Services\System\QuestionnaireService;
use Database\Seeders\QuestionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;


class QuestionnaireServiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    private $questionnaireServiceTest;


    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(QuestionSeeder::class);
        $this->questionnaireServiceTest = app(QuestionnaireService::class);

    }

    public function testStoreMethodCreatesQuestionnaireWithRandomQuestions()
    {
        $requestData = [
            'title' => 'This is sample Title',
            'expiry_date' => date('Y-m-d'),
        ];
        $request = new Request($requestData);
        $storedQuestionnaire = $this->questionnaireServiceTest->store($request);
        $this->assertDatabaseHas('questionnaires', [
            'id' => $storedQuestionnaire->id,
            'title' => 'This is sample Title',
            'expiry_date' => date('Y-m-d')
        ]);

    }

}
