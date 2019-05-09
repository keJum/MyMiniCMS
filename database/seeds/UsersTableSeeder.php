<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Случайные данные 
         */
        for ($i=0; $i < 20; $i++) { 
            DB::table('users')->insert([
                'name'=>str_random(10),
                'email'=>str_random(10).'@gmail.com',
                'skill'=>str_random(10),
                'password'=>bcrypt('123456'),
                'role_id' => $i%5,
                'department_id'=> $i%5
            ]);            
        }
        for ($i=2; $i < 6; $i++) { 
            DB::table('roles')->insert([
                'id' => $i,
                'name' => str_random(10),
                'describe' => str_random(100),
                'access' => rand(1,8),
            ]);            
        }
        for ($i=2; $i<6; $i++){
            DB::table('departments')->insert([
                'id' => $i,
                'name' => str_random(10),
                'description' => str_random(100)
            ]);
        }
    }
}

// composer dump-autoload
//php artisan db:seed --class=UsersTableSeeder