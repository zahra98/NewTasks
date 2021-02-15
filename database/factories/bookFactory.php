<?php

namespace Database\Factories;

use App\Models\book;
use Illuminate\Database\Eloquent\Factories\Factory;
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
            'user_id' => factory(App\User::class),
            'title' => $this->faker->title,
            'auther' => $this->faker->name,
            'catagory' => $this->faker->sentence,
            'copies' => 10,
            'ispn' => Str::random(15),
            // $table->string('catagory')->nullable();
            // $table->string('ispn', 15)->unique();
            // $table->integer('copies');

        ];
    }
}
//\App\Models\Book::factory()->count(3)->create(); 