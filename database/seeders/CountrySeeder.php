<?php

namespace Database\Seeders;

use App\Models\Geo\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('countries')->delete();
        $json = File::get(base_path() .'/database/seeders/json/geo_countries.json');
        $data = json_decode($json);

        foreach ($data as $item){
                Country::create(array(
                    'id' => $item->id,
                    'title' => $item->title
            ));

        }
    }
}
