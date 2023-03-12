<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\CmVersion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CmVersionSeeder extends Seeder{
    
    
    public function run(){

        $json = File::get(base_path() .'/database/seeders/json/cmVersions.json');
        $data = json_decode($json);

        foreach ($data as $item){
                CmVersion::create(array(
                    'id' => $item->id,
                    'name' =>  $item->name,
                    'version' => $item->version,
                    'publishing' => $item->publishing
            ));

        }
    }
}
