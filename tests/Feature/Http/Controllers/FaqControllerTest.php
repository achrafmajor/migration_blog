<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FaqController
 */
class FaqControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $faqs = Faq::factory()->count(3)->create();

        $response = $this->get(route('faq.index'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.faq.index');
        $response->assertViewHas('faqs');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('faq.create'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.faq.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FaqController::class,
            'store',
            \App\Http\Requests\FaqStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $ordre = $this->faker->numberBetween(-10000, 10000);
        $title = $this->faker->sentence(4);
        $content = $this->faker->paragraphs(3, true);
        $statut = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('faq.store'), [
            'ordre' => $ordre,
            'title' => $title,
            'content' => $content,
            'statut' => $statut,
        ]);

        $faqs = Faq::query()
            ->where('ordre', $ordre)
            ->where('title', $title)
            ->where('content', $content)
            ->where('statut', $statut)
            ->get();
        $this->assertCount(1, $faqs);
        $faq = $faqs->first();

        $response->assertRedirect(route('admin.pages.faq.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $faq = Faq::factory()->create();

        $response = $this->get(route('faq.show', $faq));

        $response->assertOk();
        $response->assertViewIs('admin.pages.faq.show');
        $response->assertViewHas('faq');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $faq = Faq::factory()->create();

        $response = $this->get(route('faq.edit', $faq));

        $response->assertOk();
        $response->assertViewIs('admin.pages.faq.edit');
        $response->assertViewHas('faq');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FaqController::class,
            'update',
            \App\Http\Requests\FaqUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $faq = Faq::factory()->create();
        $ordre = $this->faker->numberBetween(-10000, 10000);
        $title = $this->faker->sentence(4);
        $content = $this->faker->paragraphs(3, true);
        $statut = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('faq.update', $faq), [
            'ordre' => $ordre,
            'title' => $title,
            'content' => $content,
            'statut' => $statut,
        ]);

        $faq->refresh();

        $response->assertRedirect(route('admin.pages.faq.index'));

        $this->assertEquals($ordre, $faq->ordre);
        $this->assertEquals($title, $faq->title);
        $this->assertEquals($content, $faq->content);
        $this->assertEquals($statut, $faq->statut);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $faq = Faq::factory()->create();

        $response = $this->delete(route('faq.destroy', $faq));

        $response->assertRedirect(route('admin.pages.faq.index'));

        $this->assertDeleted($faq);
    }
}
