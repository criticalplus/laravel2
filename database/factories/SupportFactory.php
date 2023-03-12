<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Support;


class SupportFactory extends Factory{
    
    protected $model = Support::class;


    public function definition(){

        return [
            'subject' => 'Subject: '.$this->faker->name(),
            'level' => $this->faker->randomElement( ['1', '2', '3', '4', '5' ] ),
        ];
    }
    



}
