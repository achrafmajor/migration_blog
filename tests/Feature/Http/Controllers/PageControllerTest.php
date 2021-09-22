<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PageController
 */
class PageControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $pages = Page::factory()->count(3)->create();

        $response = $this->get(route('page.index'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.page.index');
        $response->assertViewHas('pages');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('page.create'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.page.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PageController::class,
            'store',
            \App\Http\Requests\PageStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $content = $this->faker->paragraphs(3, true);
        $slug = $this->faker->slug;
        $seo_titel = $this->faker->word;
        $seo_description = $this->faker->word;
        $seo_keyword = $this->faker->word;

        $response = $this->post(route('page.store'), [
            'title' => $title,
            'content' => $content,
            'slug' => $slug,
            'seo_titel' => $seo_titel,
            'seo_description' => $seo_description,
            'seo_keyword' => $seo_keyword,
        ]);

        $pages = Page::query()
            ->where('title', $title)
            ->where('content', $content)
            ->where('slug', $slug)
            ->where('seo_titel', $seo_titel)
            ->where('seo_description', $seo_description)
            ->where('seo_keyword', $seo_keyword)
            ->get();
        $this->assertCount(1, $pages);
        $page = $pages->first();

        $response->assertRedirect(route('admin.pages.page.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $page = Page::factory()->create();

        $response = $this->get(route('page.show', $page));

        $response->assertOk();
        $response->assertViewIs('page.show');
        $response->assertViewHas('page');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $page = Page::factory()->create();

        $response = $this->get(route('page.edit', $page));

        $response->assertOk();
        $response->assertViewIs('page.edit');
        $response->assertViewHas('page');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PageController::class,
            'update',
            \App\Http\Requests\PageUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $page = Page::factory()->create();
        $title = $this->faker->sentence(4);
        $content = $this->faker->paragraphs(3, true);
        $slug = $this->faker->slug;
        $seo_titel = $this->faker->word;
        $seo_description = $this->faker->word;
        $seo_keyword = $this->faker->word;

        $response = $this->put(route('page.update', $page), [
            'title' => $title,
            'content' => $content,
            'slug' => $slug,
            'seo_titel' => $seo_titel,
            'seo_description' => $seo_description,
            'seo_keyword' => $seo_keyword,
        ]);

        $page->refresh();

        $response->assertRedirect(route('page.index'));

        $this->assertEquals($title, $page->title);
        $this->assertEquals($content, $page->content);
        $this->assertEquals($slug, $page->slug);
        $this->assertEquals($seo_titel, $page->seo_titel);
        $this->assertEquals($seo_description, $page->seo_description);
        $this->assertEquals($seo_keyword, $page->seo_keyword);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $page = Page::factory()->create();

        $response = $this->delete(route('page.destroy', $page));

        $response->assertRedirect(route('page.index'));

        $this->assertDeleted($page);
    }
}
