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

//============================================
        /**
         * Другие пользователи
         */
        DB::table('users')->insert([
            'name' => 'Илья',
            'email' => 'lexa@b.ru',
            'skill' => 'Сидеть дома смотреть в компьютер',
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'department_id' => 1
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Клиент',
            'access' => 28
        ]);

// ---------------------------------------------------
        DB::table('users')->insert([
            'name' => 'Артём',
            'email' => 'lexa1@b.ru',
            'skill' => 'Разговоривать с людьми',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'department_id' => 1
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Менеджер',
            'access' => 12348
        ]);

// -------------------------------------------------------
        DB::table('users')->insert([
            'name' => 'Александр',
            'email' => 'lexa2@b.ru',
            'skill' => 'PHP Laravel, JS Vue.js',
            'password' => bcrypt('123456'),
            'role_id' => 4,
            'department_id' => 1
        ]);
        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'Разароботчик',
            'access' => 12348
        ]);

// -------------------------------------------------------
        DB::table('users')->insert([
            'name' => 'Кирил',
            'email' => 'lexa3@b.ru',
            'skill' => 'PHP PSR, PHP symfony',
            'password' => bcrypt('123456'),
            'role_id' => 5,
            'department_id' => 1
        ]);
        DB::table('roles')->insert([
            'id' => 5,
            'name' => 'Старший разработчик',
            'access' => 1234568
        ]);

// -------------------------------------------------------
        DB::table('users')->insert([
            'name' => 'Данил',
            'email' => 'lexa4@b.ru',
            'skill' => 'PHP unit test',
            'password' => bcrypt('123456'),
            'role_id' => 6,
            'department_id' => 1
        ]);
        DB::table('roles')->insert([
            'id' => 6,
            'name' => 'Тестировщик',
            'access' => 1234
        ]);

//==============================================================

DB::table('departments')->insert([
    'id' => 1,
    'name' => 'Администрация',
    'description' => 'Отдел работы с внутриним порядком'
]);
// *************************************************************************
//============================================
        /**
         * Другие пользователи
         */
        DB::table('users')->insert([
            'name' => 'Саша',
            'email' => 'em@b.ru',
            'skill' => 'Сидеть дома смотреть в компьютер',
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'department_id' => 2
        ]);

// ---------------------------------------------------
        DB::table('users')->insert([
            'name' => 'Антон',
            'email' => 'em1@b.ru',
            'skill' => 'Разговоривать с людьми',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'department_id' => 2
        ]);

// -------------------------------------------------------
        DB::table('users')->insert([
            'name' => 'Михаил',
            'email' => 'em2@b.ru',
            'skill' => 'PHP Laravel, JS Vue.js',
            'password' => bcrypt('123456'),
            'role_id' => 4,
            'department_id' => 2
        ]);

// -------------------------------------------------------
        DB::table('users')->insert([
            'name' => 'Серёжа',
            'email' => 'em3@b.ru',
            'skill' => 'PHP PSR, PHP symfony',
            'password' => bcrypt('123456'),
            'role_id' => 5,
            'department_id' => 2
        ]);

// -------------------------------------------------------
        DB::table('users')->insert([
            'name' => 'Иван',
            'email' => 'em4@b.ru',
            'skill' => 'PHP unit test',
            'password' => bcrypt('123456'),
            'role_id' => 6,
            'department_id' => 2
        ]);

//==============================================================

        DB::table('departments')->insert([
            'id' => 2,
            'name' => 'Поддержка',
            'description' => 'Отдел работы с клинтами'
        ]);
    }
}
// php artisan migrate:fresh
// php artisan db:seed