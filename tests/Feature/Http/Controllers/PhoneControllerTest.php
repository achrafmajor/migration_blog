<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Phone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PhoneController
 */
class PhoneControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $phones = Phone::factory()->count(3)->create();

        $response = $this->get(route('phone.index'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.phone.index');
        $response->assertViewHas('phones');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('phone.create'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.phone.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PhoneController::class,
            'store',
            \App\Http\Requests\PhoneStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $phone = $this->faker->phoneNumber;
        $contry_code = $this->faker->word;
        $name = $this->faker->name;

        $response = $this->post(route('phone.store'), [
            'phone' => $phone,
            'contry_code' => $contry_code,
            'name' => $name,
        ]);

        $phones = Phone::query()
            ->where('phone', $phone)
            ->where('contry_code', $contry_code)
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $phones);
        $phone = $phones->first();

        $response->assertRedirect(route('admin.pages.phone.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $phone = Phone::factory()->create();

        $response = $this->get(route('phone.show', $phone));

        $response->assertOk();
        $response->assertViewIs('admin.pages.phone.show');
        $response->assertViewHas('phone');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $phone = Phone::factory()->create();

        $response = $this->get(route('phone.edit', $phone));

        $response->assertOk();
        $response->assertViewIs('admin.pages.phone.edit');
        $response->assertViewHas('phone');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PhoneController::class,
            'update',
            \App\Http\Requests\PhoneUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $phone = Phone::factory()->create();
        $phone = $this->faker->phoneNumber;
        $contry_code = $this->faker->word;
        $name = $this->faker->name;

        $response = $this->put(route('phone.update', $phone), [
            'phone' => $phone,
            'contry_code' => $contry_code,
            'name' => $name,
        ]);

        $phone->refresh();

        $response->assertRedirect(route('admin.pages.phone.index'));

        $this->assertEquals($phone, $phone->phone);
        $this->assertEquals($contry_code, $phone->contry_code);
        $this->assertEquals($name, $phone->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $phone = Phone::factory()->create();

        $response = $this->delete(route('phone.destroy', $phone));

        $response->assertRedirect(route('phone.index'));

        $this->assertDeleted($phone);
    }
}
