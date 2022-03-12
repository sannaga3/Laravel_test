<?php

namespace Database\Factories;

use App\Models\ContactForm;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $contactForm = ContactForm::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'url' => $this->faker->url,
            'gender' => $this->faker->randomElement(['0', '1']),
            'age' => $this->faker->numberBetween($min = 1, $max = 6),
            'title' => $this->faker->realText(50),
            'contact' => $this->faker->realText(200),
        ];
    }
}
