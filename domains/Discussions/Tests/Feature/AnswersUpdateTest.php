<?php

namespace Domains\Discussions\Tests\Feature;

use Domains\Accounts\Database\Factories\UserFactory;
use Domains\Discussions\Database\Factories\AnswerFactory;
use Domains\Accounts\Models\User;
use Domains\Discussions\Models\Answer;
use Domains\Discussions\Models\Question;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AnswersUpdateTest extends TestCase
{
    use DatabaseMigrations;

    private Generator $faker;
    private User $user;
    private Question $question;
    private Answer $answer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();
        $this->answer = AnswerFactory::new()->create();
        $this->user = $this->answer->author;
        $this->question = $this->answer->question;
    }

    /** @test */
    public function it_updates_answer(): void
    {
        Carbon::setTestNow();

        $payload = [
            'content' => $this->faker->paragraph,
        ];

        $request = $this->actingAs($this->user)
            ->patch(
                route('discussions.questions.answers.update', ['questionId' => $this->question->id, 'answerId' => $this->answer->id]),
                $payload
            );

        $this->assertResponseStatus(Response::HTTP_NO_CONTENT);

        $this->assertTrue($request->response->isEmpty());

        $this->seeInDatabase('question_answers', [
            'author_id' => $this->user->id,
            'question_id' => $this->question->id,
            'content' => $payload['content'],
        ]);
    }

    /** @test */
    public function it_forbids_guests_to_update_answer(): void
    {
        $this->patch(route('discussions.questions.answers.update', ['questionId' => $this->question->id, 'answerId' => $this->answer->id]))
            ->assertResponseStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    public function it_fails_to_update_answer_on_validation_errors(): void
    {
        $this->actingAs($this->user)
            ->patch(route('discussions.questions.answers.update', ['questionId' => $this->question->id, 'answerId' => $this->answer->id]))
            ->seeJsonStructure([
                'content',
            ]);
    }

    /** @test */
    public function it_fails_to_update_answer_on_invalid_question(): void
    {
        $payload = [
            'content' => $this->faker->paragraph,
        ];

        $this->actingAs($this->user)
            ->patch(route('discussions.questions.answers.update', ['questionId' => 1000, 'answerId' => $this->answer->id]), $payload)
            ->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }

    /** @test */
    public function it_fails_to_update_answer_on_invalid_answer(): void
    {
        $payload = [
            'content' => $this->faker->paragraph,
        ];

        $this->actingAs($this->user)
            ->patch(route('discussions.questions.answers.update', ['questionId' => $this->question->id, 'answerId' => 1000]), $payload)
            ->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }

    /** @test */
    public function it_fails_to_update_on_invalid_author()
    {
        $payload = [
            'content' => $this->faker->paragraph,
        ];

        $this->actingAs(UserFactory::new()->make())
            ->patch(
                route('discussions.questions.answers.update', ['questionId' => $this->question->id, 'answerId' => $this->answer->id]),
                $payload
            )->assertResponseStatus(Response::HTTP_FORBIDDEN);
    }
}
