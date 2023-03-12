<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserData;
use App\Models\UserServer;
use App\Models\Support;
use App\Models\SupportComment;
use App\Models\Address;

class UsersSeeder extends Seeder{


    public function run(){

        $id = DB::table("users")
            ->insertGetId([
                'name' => 'Criti',
                'email' => 'riospapapa@gmail.com',
                "email_verified_at" => NULL,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                "remember_token" => NULL,
                "created_at" => now(),
                "updated_at" => now(),
                "deleted_at" => NULL,
                "role" => 'admin',
            ]);

        DB::table("users_data")
            ->insert([
                "user_id" => $id,
                "role" => "Admin",
                'firstname' =>'Criti',
                'lastname' => 'Cal',
                'birthday' => '1990/09/11',
                'newsletter' => 0,
                'dni' => rand(11111111, 99999999)."-z",
                'notes' => 'notas',
            ]);




        User::factory(25)
            ->has(UserData::factory(1)   )
            ->create()
            ->each(function($user){
                $user->Support()->saveMany(
                    Support::factory(rand(1,4))->create( [ 'user_id' => $user->id, 'admin_id' => $user->UserData->where('role', 'admin')->inRandomOrder()->first() ])

                    ->each(function($support){
                        //var_dump($support);exit; 
                        $support->SupportComment()->saveMany(
                            SupportComment::factory(1)->make( ['support_id' => $support->id ] )
                        );        
                        $support->SupportComment()->saveMany(
                            SupportComment::factory(1)->make( ['support_id' => $support->id ] )
                        );                                          
                    })

                );
                $user->Address()->saveMany(
                    Address::factory(rand(1,2))->create( [ 'user_id' => $user->id ])
                );
                $user->UserServer()->saveMany(
                    UserServer::factory(rand(1,2))->create( [ 'user_id' => $user->id ])
                );
            });



 /*             FUNCIONA

        User::factory(25)
        ->has(UserData::factory()->count(1) )
        ->create()
        ->each(function($user){
            //var_dump($user);exit;
            $user->Support()->saveMany(
                Support::factory(rand(1,4))->make( [ 'user_id' => $user->id, 'admin_id' => $user->UserData->where('role', 'admin')->inRandomOrder()->first() ])


            );
        });


        $supports = Support::all();

        foreach( $supports as $support){
            //var_dump($support);exit; 
            $support->SupportComment()->saveMany(
                SupportComment::factory(1)->make( ['support_id' => $support->id, 'user_id' => $support->user_id ] )
            );             
            $support->SupportComment()->saveMany(
                SupportComment::factory(1)->make( ['support_id' => $support->id, 'user_id' => $support->admin_id ] )
            );
            if(rand(1,2)==1){
                $support->SupportComment()->saveMany(
                    SupportComment::factory(1)->make( ['support_id' => $support->id, 'user_id' => $support->user_id ] )
                );             
                $support->SupportComment()->saveMany(
                    SupportComment::factory(1)->make( ['support_id' => $support->id, 'user_id' => $support->admin_id ] )
                );
            }

        }
 */

    }





}
