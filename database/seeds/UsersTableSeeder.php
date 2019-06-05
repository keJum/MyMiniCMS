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

        DB::table('departments')->insert([
            'id' => 1,
            'name' => 'Администрация',
            'description' => 'Отдел работы с внутриним порядком'
        ]);

        DB::table('users')->insert([
            'name' => 'Саша',
            'email' => 'em@b.ru',
            'skill' => 'Сидеть дома смотреть в компьютер',
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'department_id' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Антон',
            'email' => 'em1@b.ru',
            'skill' => 'Разговоривать с людьми',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'department_id' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Михаил',
            'email' => 'em2@b.ru',
            'skill' => 'PHP Laravel, JS Vue.js',
            'password' => bcrypt('123456'),
            'role_id' => 4,
            'department_id' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Серёжа',
            'email' => 'em3@b.ru',
            'skill' => 'PHP PSR, PHP symfony',
            'password' => bcrypt('123456'),
            'role_id' => 5,
            'department_id' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Иван',
            'email' => 'em4@b.ru',
            'skill' => 'PHP unit test',
            'password' => bcrypt('123456'),
            'role_id' => 6,
            'department_id' => 2
        ]);


        DB::table('departments')->insert([
            'id' => 2,
            'name' => 'Поддержка',
            'description' => 'Отдел работы с клинтами'
        ]);

        /**
         * Созание базы данных для базы знаний
         */

        DB::table('knowledge')->insert([
            'id'=>1,
            'theme' => 'Создание записей в таблицу',
            'text' =>
            '<p>Посвящен системе управления базами данных MySQL. Рассматриваются основы MySQL: запросы, модели баз данных, а также транзакции. На примерах рассмотрен весь спектр вопросов, касающихся языковой структуры, допустимых типов столбцов, операторов, операций и функций, а также существующих расширений MySQL.</p>

            <p>Курс рассчитан на разработчиков Web-приложений и администраторов любой квалификации, а также на студентов и преподавателей соответствующих дисциплин. Рассматриваются основы системы MySQL и языка SQL: от моделей баз данных, до сложных запросов. Курс содержит множество примеров: на практике рассмотрен весь спектр вопросов, касающихся языковой структуры, допустимых типов столбцов, операторов, операций и функций, а также существующих расширений MySQL. Кроме того, рассмотрены вопросы взаимодействия системы MySql с языками PHP и Perl.</p>
            
            <p>Лекция&nbsp;1.&nbsp;Введение в MySQL</p>
            
            <p><strong>Компьютерные системы хранения</strong></p>
            
            <p>В наши дни люди часто говорят о базах данных. Компьютеры составляют неотъемлемую часть современного общества, поэтому нередко можно услышать фразы вроде &quot;Я поищу твою&nbsp;<em>запись</em>в базе данных&quot;. И речь идет не о больших ящиках, где хранятся груды папок, а о компьютерных системах, предназначенных для ускоренного поиска информации.</p>
            
            <p>Компьютеры так прочно вошли в нашу жизнь, потому что их можно запрограммировать на выполнение утомительных, повторяющихся операций и решение задач, которые нам самим было бы не под силу решить без их вычислительной скорости и емкости информационных носителей. Помещение информации на бумагу и разработка схемы хранения бумаг в папках и картотеках &mdash; достаточно четко отработанный процесс, но многие вздохнули с облегчением, когда задача свелась к перемещению электронных документов в папки на жестком диске.</p>
            
            <p>Одной из функций баз данных является упорядочение и&nbsp;<em>индексация</em>&nbsp;информации. Как и в библиотечной картотеке, не нужно просматривать половину архива, чтобы найти нужную&nbsp;<em>запись</em>. Все выполняется гораздо быстрее.</p>
            
            <p>Не все&nbsp;<em>базы данных</em>&nbsp;создаются на основе одних и тех же принципов, но традиционно в них применяется идея организации данных в виде записей. Каждая&nbsp;<em>запись</em>&nbsp;имеет фиксированный набор полей. Записи помещаются в таблицы, а совокупность таблиц формирует базу данных.</p>
            
            <p>Для работы с базой данных необходима&nbsp;<em><strong>СУБД (система управления базами данных), т.е. программа, которая берет на себя все заботы, связанные с доступом к данным. Она содержит команды, позволяющие создавать таблицы, вставлять в них записи, искать и даже удалять таблицы.</strong></em>.</p>
            
            <p>MySQL - это быстрая, надежная, открыто распространяемая&nbsp;<em>СУБД</em>. MySQL, как и многие другие&nbsp;<em>СУБД</em>, функционирует&nbsp;<em>по</em>&nbsp;модели &quot;клиент/<em>сервер</em>&quot;. Под этим подразумевается сетевая<em>архитектура</em>, в которой компьютеры играют роли клиентов либо серверов. На рис.&nbsp;1.1&nbsp;изображена схема передачи информации между компьютером клиента и жестким диском сервера.</p>
            
            <p><img src="https://studfiles.net/html/2706/19/html_5TKEt4EfwP.2GDV/img-OvQbGr.png" style="height:51px; width:539px" /></p>
            
            <p><strong>Рис. 1.1.&nbsp;</strong>Схема передачи данных в архитектуре &quot;клиент/сервер&quot;</p>
            '
        ]);

        DB::table('knowledge')->insert([
            'id'=>2,
            'theme' => 'Создание таблицы',
            'text' =>'
            <p>Урок &quot;<strong>Основные понятия БД &quot;</strong></p>
            <p>&nbsp;Рассмотрим, например, базу данных:<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Телефонный справочник</strong></p>
            <table align="center" border="1" cellspacing="0">
                <tbody>
                    <tr>
                        <td style="vertical-align:top; width:58.25pt">
                        <p><strong>№</strong></p>
                        </td>
                        <td style="vertical-align:top; width:128.75pt">
                        <p><strong>Фамилия</strong></p>
                        </td>
                        <td style="vertical-align:top; width:84.15pt">
                        <p><strong>Адрес</strong></p>
                        </td>
                        <td style="vertical-align:top; width:84.15pt">
                        <p><strong>Телефон</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top; width:58.25pt">
                        <p>1</p>
                        </td>
                        <td style="vertical-align:top; width:128.75pt">
                        <p>Иванов В.В.</p>
                        </td>
                        <td style="vertical-align:top; width:84.15pt">
                        <p>Серова, 5 12</p>
                        </td>
                        <td style="vertical-align:top; width:84.15pt">
                        <p>4325345</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top; width:58.25pt">
                        <p>2</p>
                        </td>
                        <td style="vertical-align:top; width:128.75pt">
                        <p>Петров И.И.</p>
                        </td>
                        <td style="vertical-align:top; width:84.15pt">
                        <p>Седова, 3-21</p>
                        </td>
                        <td style="vertical-align:top; width:84.15pt">
                        <p>3454365</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            '
        ]);
    }
}

// composer dump-autoload
//php artisan db:seed --class=UsersTableSeeder