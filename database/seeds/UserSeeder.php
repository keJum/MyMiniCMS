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

        DB::table('users')->insert([
            'name' => 'Алексей',
            'role_id' => '1',
            'email' => 'adm@adm.com',
            'department_id' => 1,
            'password'=>bcrypt('123456'),
            'remember_token'=>str_random(10)
          ]);
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Адмистратор',
            'describe' => 'Польный доступ',
            'access' => 12345678,
          ]);
    }
}
// php artisan migrate:fresh
// php artisan db:seed