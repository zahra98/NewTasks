<?php

namespace Database\Factories;

use App\Models\book;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;
class bookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            //
            'user_id' => \App\Models\User::factory()->create(),
            'title' => $this->faker->sentence,
            'auther' => $this->faker->name,
            'catagory' => $this->faker->sentence,
            'copies' => 10,
            'ispn' => Str::random(15),


        ];
    }
}
//\App\Models\Book::factory()->count(3)->create(); 