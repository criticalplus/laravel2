<?php
namespace Database\Seeders;

use App\Models\Geo\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        //DB::table('cities')->delete();
        $json = File::get(base_path() .'/database/seeders/json/geo_cities.json');
        $data = json_decode($json);

        foreach ($data as $item){
                City::create(array(
                    'id' => $item->id,
                    'country_id' => 34,
                    'state_id' => $item->id_state,
                    'title' => $item->title
            ));

        }
    }
}
