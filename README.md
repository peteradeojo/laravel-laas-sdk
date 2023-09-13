# Laravel SDK for the LAAS API

## Installation

```bash
composer require onezero/laas
```

## Usage
To use the SDK, set your LAAS_TOKEN in your `.env` file. You can get this from the LAAS dashboard.

```bash
LAAS_TOKEN=your-app-token
```

For Laravel v9^, the package will automatically register the service provider and facade.

For Laravel v8^, add the service provider and facade to your `config/app.php` file.

```php
// config/app.php
'providers' => [
    ...,
    OneZero\Laas\LaasServiceProvider::class,
],
```

```php
use OneZero\Laas\Laas;
...
$laas = new Laas();

$laas->error('Something went wrong', context: [
    'user' => 'John Doe',
    'email' => 'johndoe@example.com',
]);
```

or use the Facade

```php
use OneZero\Laas\Facades\Laas;

Laas::error('Something went wrong', context: [
    'user' => 'John Doe',
    'email' => '',
]);

// OR use the function helper

laas()->error('Something went wrong', context: [
    'user' => 'John Doe',
    'email' => '',
]);
```

## Log Levels
All the basic laravel log levels are available and an added `critical` and `warning` level. Just for vibes.

```php
laas()->debug('Debug message');
laas()->info('Info message');
laas()->error('Error message');
laas()->emergency('Emergency message');

// Bonus
laas()->warning('Warning message');
laas()->critical('Critical message');
```
