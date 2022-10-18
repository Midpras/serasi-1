<?php

namespace Database\Factories;

use App\Models\Level2;
use Illuminate\Database\Eloquent\Factories\Factory;

class Level2Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Level2::class;

    public function definition()
    {
        return [
            'nama_lvl2' => $this->faker->sentence,
        ];
    }
}
