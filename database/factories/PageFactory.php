<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Page;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraphs(3, true),
            'seo_titel' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'seo_description' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'seo_keyword' => $this->faker->regexify('[A-Za-z0-9]{400}'),
        ];
    }
}
