<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Service;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug,
            'link' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'title' => $this->faker->sentence(4),
            'desciption' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'position' => $this->faker->numberBetween(-10000, 10000),
            'statut' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
