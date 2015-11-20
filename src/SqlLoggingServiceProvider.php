<?php

namespace OscarAGCP\SqlLogging;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class SqlLoggingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/sql-logging.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('sql-logging.php');
        } else {
            $publishPath = base_path('config/sql-logging.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('sql-logging.log', false)) {
            Event::listen('illuminate.query',
                function($query, $bindings, $time) {
                $data = compact('bindings', 'time');

                // Format binding data for sql insertion
                foreach ($bindings as $i => $binding) {
                    if ($binding instanceof \DateTime) {
                        $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                    } else if (is_string($binding)) {
                        $bindings[$i] = "'$binding'";
                    }
                }

                // Insert bindings into query
                $query = str_replace(array('%', '?'), array('%%', '%s'), $query);
                $query = vsprintf($query, $bindings);

                $log = new Logger('sql');
                $log->pushHandler(new StreamHandler(storage_path().'/logs/sql-'.date('Y-m-d').'.log',
                    Logger::INFO));

                // add records to the log
                $log->addInfo($query, $data);
            });
        }

    }
}
