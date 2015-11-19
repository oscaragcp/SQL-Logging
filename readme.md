# SQL Logging

A package which allows to log SQL queries in Laravel

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

```js
    'OscarAGCP\SqlLogging\SqlLoggingServiceProvider',
```