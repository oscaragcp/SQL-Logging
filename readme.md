# Laravel 5 SQL Logger

Laravel 5 package for loggin SQL queries.

## Install

Require this package with composer using the following command:

```bash
composer require oscaragcp/sql-logging
```

Or just add oscaragcp/sql-logging to your composer.json file:

```js
{
    "require": {
        "oscaragcp/sql-logging": "dev-master"
    }
}
```

After updating composer, add the service provider to the `providers` array in `config/app.php`

```php
"OscarAGCP\SqlLogging\SqlLoggingServiceProvider",
```

You can also publish the config file to enable/disable the logging.

```bash
php artisan vendor:publish --provider="OscarAGCP\SqlLogging\SqlLoggingServiceProvider"
```