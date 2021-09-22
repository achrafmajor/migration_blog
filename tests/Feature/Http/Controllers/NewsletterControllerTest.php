<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NewsletterController
 */
class NewsletterControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $newsletters = Newsletter::factory()->count(3)->create();

        $response = $this->get(route('newsletter.index'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.newsletter.index');
        $response->assertViewHas('newsletters');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('newsletter.create'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.newsletter.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NewsletterController::class,
            'store',
            \App\Http\Requests\NewsletterStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $email = $this->faker->safeEmail;

        $response = $this->post(route('newsletter.store'), [
            'email' => $email,
        ]);

        $newsletters = Newsletter::query()
            ->where('email', $email)
            ->get();
        $this->assertCount(1, $newsletters);
        $newsletter = $newsletters->first();

        $response->assertRedirect(route('admin.pages.newsletter.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $newsletter = Newsletter::factory()->create();

        $response = $this->get(route('newsletter.show', $newsletter));

        $response->assertOk();
        $response->assertViewIs('admin.pages.newsletter.show');
        $response->assertViewHas('newsletter');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $newsletter = Newsletter::factory()->create();

        $response = $this->get(route('newsletter.edit', $newsletter));

        $response->assertOk();
        $response->assertViewIs('admin.pages.newsletter.edit');
        $response->assertViewHas('newsletter');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NewsletterController::class,
            'update',
            \App\Http\Requests\NewsletterUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $newsletter = Newsletter::factory()->create();
        $email = $this->faker->safeEmail;

        $response = $this->put(route('newsletter.update', $newsletter), [
            'email' => $email,
        ]);

        $newsletter->refresh();

        $response->assertRedirect(route('admin.pages.newsletter.index'));

        $this->assertEquals($email, $newsletter->email);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $newsletter = Newsletter::factory()->create();

        $response = $this->delete(route('newsletter.destroy', $newsletter));

        $response->assertRedirect(route('admin.pages.newsletter.index'));

        $this->assertDeleted($newsletter);
    }
}
