<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SupportComment;


class SupportCommentFactory extends Factory{
    
    protected $model = SupportComment::class;


    public function definition(){

        return [
            'message' => $this->faker->paragraph(),
            'file' => '/public/file/'.$this->faker->lexify('???????').'.png',
            'ip' => $this->faker->ipv4(),
            'mac' => $this->faker->macAddress(),
            'view' => $this->faker->boolean(),
        ];
    }
    



}
