<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserServer;
use App\Models\CmVersion;

class UserServerFactory extends Factory{

    protected $model = UserServer::class;


    public function definition(){

        return [
            'name' => $this->faker->numerify('Server ###'),
            'cm_version_id' => CmVersion::all()->random()->id,
            'ws_url' => 'https://'.$this->faker->domainName().'/api/',
            'ws_api' => $this->faker->sha256(),
            'color' => $this->faker->hexcolor(),
            'active' => $this->faker->randomElement( [0,1,1,1] ),
        ];
    }



}