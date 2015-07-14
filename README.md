# MessageBird bridge for laravel 

A quickly build Laravel bridge for the `messagebird/php-rest-api` package. This is only used in a small personal project but feel free to use / improve.

## Install

```
composer require bjrnblm/messagebird
```

## Configuration

Create the config file

```
php artisan vendor:publish
```

Set your `access_key` in `config/messagebird.php` 

## Usage

### Get Balance

```
Messagebird::getBalance();
```

### Create Message

```
Messagebird::createMessage($originator, $recipients = [], $body);
```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
