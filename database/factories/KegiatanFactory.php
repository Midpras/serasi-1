<?php

namespace Database\Factories;

use App\Models\Kegiatan;
use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;
use Illuminate\Database\Eloquent\Factories\Factory;

class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * 
     */

    protected $model = Kegiatan::class;
    public function definition()
    {
        return [
            'id_lvl1' => Level1::factory(),
            'id_lvl2' => Level2::factory(),
            'id_lvl3' => Level3::factory(),
            'nama_kegiatan' => $this->faker->sentence()
        ];
    }
}
