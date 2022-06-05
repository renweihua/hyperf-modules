<?php

    declare(strict_types=1);
    /**
     * This file is part of Hyperf.
     *
     * @link     https://www.hyperf.io
     * @document https://hyperf.wiki
     * @contact  group@hyperf.io
     * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
     */
    return [
        'namespace' => 'App\Modules',
        'stubs' => [
            'enabled' => false,
            'path' => BASE_PATH . 'vendor/nwidart/laravel-modules/src/Commands/stubs',
            'files' => [
                'scaffold/config' => 'Config/config.php',
                'composer' => 'composer.json',
                'package' => 'package.json',
            ],
        ],
        'paths' => [
            'modules' => BASE_PATH . '/app/Modules',
        ],
        'generator' => [
            'amqp' => [
                'consumer' => [
                    'namespace' => 'Amqp\\Consumer',
                ],
                'producer' => [
                    'namespace' => 'Amqp\\Producer',
                ],
            ],
            'command' => [
                'namespace' => 'Command',
            ],
            'controller' => [
                'namespace' => 'Http/Controller',
            ],
            'event' => [
                'namespace' => 'Events'
            ],
            'jobs' => [
                'namespace' => 'Jobs',
            ],
            'listener' => [
                'namespace' => 'Listeners',
            ],
            'middleware' => [
                'namespace' => 'Http/Middleware',
            ],
            'model' => [
                'namespace' => 'Modle',
            ],
            'repository' => [
                'namespace' => 'Repositories',
            ],
            'request' => [
                'path' => 'Http/Requests'
            ],

            // 'config' => ['path' => 'Config', 'generate' => true],
            // 'migration' => ['path' => 'Database/Migrations', 'generate' => true],
            // 'seeder' => ['path' => 'Database/Seeders', 'generate' => true],
            // 'factory' => ['path' => 'Database/factories', 'generate' => true],
            // 'filter' => ['path' => 'Http/Middleware', 'generate' => true],
            // 'provider' => ['path' => 'Providers', 'generate' => true],
            // 'notifications' => ['path' => 'Notifications', 'generate' => false],
        ],
    ];
