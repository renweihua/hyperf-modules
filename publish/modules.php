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
            'replacements' => [
                'routes/web' => ['LOWER_NAME', 'STUDLY_NAME'],
                'routes/api' => ['LOWER_NAME'],
                'webpack' => ['LOWER_NAME'],
                'json' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE', 'PROVIDER_NAMESPACE'],
                'views/index' => ['LOWER_NAME'],
                'views/master' => ['LOWER_NAME', 'STUDLY_NAME'],
                'scaffold/config' => ['STUDLY_NAME'],
                'composer' => [
                    'LOWER_NAME',
                    'STUDLY_NAME',
                    'VENDOR',
                    'AUTHOR_NAME',
                    'AUTHOR_EMAIL',
                    'MODULE_NAMESPACE',
                    'PROVIDER_NAMESPACE',
                ],
            ],
            'gitkeep' => true,
        ],
        'paths' => [
            'modules' => BASE_PATH . '/app/Modules',
            'generator' => [
                'config' => ['path' => 'Config', 'generate' => true],
                'command' => ['path' => 'Console', 'generate' => true],
                // 'migration' => ['path' => 'Database/Migrations', 'generate' => true],
                // 'seeder' => ['path' => 'Database/Seeders', 'generate' => true],
                // 'factory' => ['path' => 'Database/factories', 'generate' => true],
                'model' => ['path' => 'Entities', 'generate' => true],
                'controller' => ['path' => 'Http/Controllers', 'generate' => true],
                'request' => ['path' => 'Http/Requests', 'generate' => true],
                'repository' => ['path' => 'Repositories', 'generate' => false],
                'event' => ['path' => 'Events', 'generate' => false],
                'listener' => ['path' => 'Listeners', 'generate' => false],
                'jobs' => ['path' => 'Jobs', 'generate' => false],
            ],
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
                'namespace' => 'Http/Requests'
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
