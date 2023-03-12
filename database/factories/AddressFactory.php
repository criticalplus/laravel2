<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;
use App\Models\User;
use App\Models\Geo\City;
use App\Models\Geo\State;
use App\Models\Geo\Country;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AddressFactory extends Factory{


    protected $model = Address::class;


    public function definition(){

        $city = City::all()->random();

        return [
            'user_id' => User::all()->random()->id,
            'country_id' => Country::find($city->country_id),
            'state_id' => State::find($city->state_id),
            'city_id' => $city->id,
            'alias' => $this->faker->numerify('Address ###'),
            'address' => $this->faker->streetAddress(),
            'postal_code' => $this->faker->postcode(),
            'phone' => $this->faker->e164PhoneNumber(),
            'active' => $this->faker->boolean(),
        ];
    }
    

}
