<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds. Artisna db:seed ot migrate:fresh -seed
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 'admin', 1)->create();
        DB::table('users')->insert([
            'name' => 'Администратор',
            'role' => 1,
            'email' => 'adm@adm.com',
            'password'=>bcrypt('123456'),
            'remember_token'=>str_random(10)
          ]);
        DB::table('roles')->insert([
            'name' => 'administrator',
            'describe' => 'adm',
            'access' => 12345678,
          ]);
    }
}
