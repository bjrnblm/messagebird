# MessageBird bridge for laravel 

A quickly built Laravel bridge for the `messagebird/php-rest-api` package. This is only used in a small personal project but feel free to use / improve.

## Install

``` bash
composer require bjrnblm/messagebird dev-master
```

Add the following your `providers` in `config/app.php`

``` php
Bjrnblm\Messagebird\MessagebirdServiceProvider::class
```

Add the following your `aliases` in `config/app.php`

``` php
'Messagebird' => Bjrnblm\Messagebird\Facades\Messagebird::class
```

## Configuration

``` bash
php artisan vendor:publish
```

Set your `access_key` in `config/messagebird.php` 

## Usage

### Get Balance

``` php
Messagebird::getBalance();
```

### Create Message

``` php
Messagebird::createMessage($originator, $recipients = [], $body);
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
