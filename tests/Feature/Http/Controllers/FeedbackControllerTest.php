<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FeedbackController
 */
class FeedbackControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $feedback = Feedback::factory()->count(3)->create();

        $response = $this->get(route('feedback.index'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.feedback.index');
        $response->assertViewHas('feedbacks');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('feedback.create'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.feedback.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FeedbackController::class,
            'store',
            \App\Http\Requests\FeedbackStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $content = $this->faker->paragraphs(3, true);
        $name = $this->faker->name;
        $job = $this->faker->word;

        $response = $this->post(route('feedback.store'), [
            'content' => $content,
            'name' => $name,
            'job' => $job,
        ]);

        $feedback = Feedback::query()
            ->where('content', $content)
            ->where('name', $name)
            ->where('job', $job)
            ->get();
        $this->assertCount(1, $feedback);
        $feedback = $feedback->first();

        $response->assertRedirect(route('admin.pages.feedback.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $feedback = Feedback::factory()->create();

        $response = $this->get(route('feedback.show', $feedback));

        $response->assertOk();
        $response->assertViewIs('admin.pages.feedback.show');
        $response->assertViewHas('feedback');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $feedback = Feedback::factory()->create();

        $response = $this->get(route('feedback.edit', $feedback));

        $response->assertOk();
        $response->assertViewIs('admin.pages.feedback.edit');
        $response->assertViewHas('feedback');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FeedbackController::class,
            'update',
            \App\Http\Requests\FeedbackUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $feedback = Feedback::factory()->create();
        $content = $this->faker->paragraphs(3, true);
        $name = $this->faker->name;
        $job = $this->faker->word;

        $response = $this->put(route('feedback.update', $feedback), [
            'content' => $content,
            'name' => $name,
            'job' => $job,
        ]);

        $feedback->refresh();

        $response->assertRedirect(route('admin.pages.feedback.index'));

        $this->assertEquals($content, $feedback->content);
        $this->assertEquals($name, $feedback->name);
        $this->assertEquals($job, $feedback->job);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $feedback = Feedback::factory()->create();

        $response = $this->delete(route('feedback.destroy', $feedback));

        $response->assertRedirect(route('admin.pages.feedback.index'));

        $this->assertDeleted($feedback);
    }
}
