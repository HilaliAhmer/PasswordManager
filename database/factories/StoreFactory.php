<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;

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
        $regex_pass='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@!%*+?&])[A-Za-z\d@!%*+?&]{8,}$/';
        $password=$this->faker->password();
        $strong_password=preg_match($regex_pass,$password);
        $title=$this->faker->sentence(rand(3,7));
        return [
            'password_type_id'=>rand(1,4),
            'title'=>$title,
            'username'=>$this->faker->userName(),
            'password'=>$password,
            'strong_password'=>$strong_password,
            'url'=>$this->faker->url(),
            'description'=>$this->faker->text(50),
            'slug'=>str::slug($title),
        ];
    }
}
