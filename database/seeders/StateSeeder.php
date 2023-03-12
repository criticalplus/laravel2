<?php
namespace Database\Seeders;

use App\Models\Geo\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        //DB::table('states')->delete();
        $json = File::get(base_path() .'/database/seeders/json/geo_states.json');
        $data = json_decode($json);

        foreach ($data as $item){
                State::create(array(
                    'id' => $item->id,
                    'country_id' => $item->country_id,
                    'title' => $item->title
            ));

        }
    }
}
