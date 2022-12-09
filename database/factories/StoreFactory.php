<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    protected $model=Store::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(rand(3,7)),
            'username'=>$this->faker->userName(),
            'password'=>$this->faker->password(),
            'url'=>$this->faker->url(),
            'description'=>$this->faker->text(50),
        ];
    }
}
