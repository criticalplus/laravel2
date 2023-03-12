<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserData;
use App\Models\User;

class UserDataFactory extends Factory{

    protected $model = UserData::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(){

        return [
            'role' => $this->faker->randomElement( ['cliente-1','cliente-1','cliente-1','cliente-1', 'cliente-2', 'cliente-2', 'cliente-3' ] ),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'birthday' => $this->faker->date(),
            'newsletter' => $this->faker->randomElement( [0,0,0,1] ),
            'dni' => rand(11111111, 99999999).'-'.$this->faker->randomLetter(),
            'notes' => $this->faker->paragraph(),
        ];
    }



}