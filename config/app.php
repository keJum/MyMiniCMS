<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Имя приложения
    |--------------------------------------------------------------------------
    |
    | Это значение - название вашего приложения. Это значение используется, когда
    | Фреймворк должен поместить имя приложения в уведомлении или
    | любое другое местоположение, как требуется приложением или его пакетами.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Прикладная среда
    |--------------------------------------------------------------------------
    |
    | Это значение определяет «среду», в которой ваше приложение в настоящее время
    | работает. Это может определить, как вы предпочитаете настраивать различные
    | сервисы, которые использует приложение. Установите это в своем файле .env.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Режим отладки приложения
    |--------------------------------------------------------------------------
    |
    | Когда ваше приложение находится в режиме отладки, подробные сообщения об ошибках с
    | следы стека будут отображаться при каждой ошибке, которая происходит внутри вашего
    | приложение. Если отключено, отображается простая страница общих ошибок.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL приложения
    |--------------------------------------------------------------------------
    |
    | Этот URL-адрес используется консолью для правильной генерации URL-адресов при использовании
    | инструмент командной строки Artisan. Вы должны установить это в корень
    | ваше приложение, чтобы оно использовалось при выполнении задач Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Часовой пояс приложения
    |--------------------------------------------------------------------------
    |
    | Здесь вы можете указать часовой пояс по умолчанию для вашего приложения, который
    | будет использоваться PHP-функцией date и date-time. Мы ушли
    | вперед и установите это разумное значение по умолчанию для вас из коробки.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Конфигурация локали приложения
    |--------------------------------------------------------------------------
    |
    | Локаль приложения определяет локаль по умолчанию, которая будет использоваться
    | поставщиком услуг перевода. Вы можете установить это значение
    | на любой из языков, которые будут поддерживаться приложением.
    |
    */

    'locale' => 'en',

    /*
    | ------------------------------------------------- -------------------------
    | Языковой стандарт приложения
    | ------------------------------------------------- -------------------------
    |
    | Резервная локаль определяет локаль, которая будет использоваться при текущей
    | не доступен. Вы можете изменить значение, чтобы соответствовать любому из
    | языковые папки, которые предоставляются через ваше приложение.
    |
    */

    'fallback_locale' => 'en',

    /*
    | ------------------------------------------------- -------------------------
    | Faker Locale
    | ------------------------------------------------- -------------------------
    |
    | Эта локаль будет использоваться PHP-библиотекой Faker при создании фейка
    | данные для вашей базы данных семян. Например, это будет использоваться для получения
    | локализованные номера телефонов, информация об адресе улицы и многое другое.
    |
    */

    'faker_locale' => 'en_US',

    /*
   | ------------------------------------------------- -------------------------
    | Ключ шифрования
    | ------------------------------------------------- -------------------------
    |
    | Этот ключ используется службой шифрования Illuminate и должен быть установлен
    | в случайную строку из 32 символов, в противном случае эти зашифрованные строки
    | не будет в безопасности. Пожалуйста, сделайте это перед развертыванием приложения!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Автозагрузочные сервис-провайдеры
    | ------------------------------------------------- -------------------------
    |
    | Поставщики услуг, перечисленные здесь, будут автоматически загружены на
    | запрос к вашей заявке. Не стесняйтесь добавлять свои собственные услуги в
    | этот массив для предоставления расширенной функциональности вашим приложениям.
    |
    */

    'providers' => [

        /*
         * сервис-провайдер фреймворка Laravel Framework ...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Сервис-провайдер внешние пакеты ...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Unisharp\Ckeditor\ServiceProvider::class,

    ],

    /*
    | ------------------------------------------------- -------------------------
    | Объект псевдонимов
    | ------------------------------------------------- -------------------------
    |
    | Этот массив псевдонимов классов будет зарегистрирован, когда это приложение
    | запущен Тем не менее, не стесняйтесь регистрировать столько, сколько хотите
    | псевдонимы загружаются так, чтобы они не мешали работе.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

    ],

];
