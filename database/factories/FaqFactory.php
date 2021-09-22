<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Faq;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ordre' => $this->faker->numberBetween(-10000, 10000),
            'title' => $this->faker->sentence(4),
            'content' => $this->faker->paragraphs(3, true),
            'statut' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
