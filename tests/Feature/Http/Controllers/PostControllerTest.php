<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PostController
 */
class PostControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $posts = Post::factory()->count(3)->create();

        $response = $this->get(route('post.index'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.post.index');
        $response->assertViewHas('posts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('post.create'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.post.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PostController::class,
            'store',
            \App\Http\Requests\PostStoreRequest::class
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
        $desciption = $this->faker->text;
        $statut = $this->faker->numberBetween(-10000, 10000);
        $seo_titel = $this->faker->word;
        $seo_description = $this->faker->word;
        $seo_keyword = $this->faker->word;

        $response = $this->post(route('post.store'), [
            'title' => $title,
            'content' => $content,
            'slug' => $slug,
            'desciption' => $desciption,
            'statut' => $statut,
            'seo_titel' => $seo_titel,
            'seo_description' => $seo_description,
            'seo_keyword' => $seo_keyword,
        ]);

        $posts = Post::query()
            ->where('title', $title)
            ->where('content', $content)
            ->where('slug', $slug)
            ->where('desciption', $desciption)
            ->where('statut', $statut)
            ->where('seo_titel', $seo_titel)
            ->where('seo_description', $seo_description)
            ->where('seo_keyword', $seo_keyword)
            ->get();
        $this->assertCount(1, $posts);
        $post = $posts->first();

        $response->assertRedirect(route('admin.pages.post.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('post.show', $post));

        $response->assertOk();
        $response->assertViewIs('admin.pages.post.show');
        $response->assertViewHas('post');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('post.edit', $post));

        $response->assertOk();
        $response->assertViewIs('admin.pages.post.edit');
        $response->assertViewHas('post');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PostController::class,
            'update',
            \App\Http\Requests\PostUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $post = Post::factory()->create();
        $title = $this->faker->sentence(4);
        $content = $this->faker->paragraphs(3, true);
        $slug = $this->faker->slug;
        $desciption = $this->faker->text;
        $statut = $this->faker->numberBetween(-10000, 10000);
        $seo_titel = $this->faker->word;
        $seo_description = $this->faker->word;
        $seo_keyword = $this->faker->word;

        $response = $this->put(route('post.update', $post), [
            'title' => $title,
            'content' => $content,
            'slug' => $slug,
            'desciption' => $desciption,
            'statut' => $statut,
            'seo_titel' => $seo_titel,
            'seo_description' => $seo_description,
            'seo_keyword' => $seo_keyword,
        ]);

        $post->refresh();

        $response->assertRedirect(route('admin.pages.post.index'));

        $this->assertEquals($title, $post->title);
        $this->assertEquals($content, $post->content);
        $this->assertEquals($slug, $post->slug);
        $this->assertEquals($desciption, $post->desciption);
        $this->assertEquals($statut, $post->statut);
        $this->assertEquals($seo_titel, $post->seo_titel);
        $this->assertEquals($seo_description, $post->seo_description);
        $this->assertEquals($seo_keyword, $post->seo_keyword);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $post = Post::factory()->create();

        $response = $this->delete(route('post.destroy', $post));

        $response->assertRedirect(route('post.index'));

        $this->assertDeleted($post);
    }
}
