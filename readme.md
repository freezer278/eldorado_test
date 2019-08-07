### для запуска локально
нужен установленный redis для кеша и очередей

* `cp .env.example .env`
* `composer install`
* `php artisan migrate --seed`