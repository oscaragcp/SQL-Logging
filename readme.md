# SQL Logging

Laravel package for loggin SQL queries.

## Installation

Begin by installing this package through Composer.

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
php artisan vendor:publish --provider="OscarAGCP\SqlLogging\SqlLoggingServiceProvider" --tag=config
```