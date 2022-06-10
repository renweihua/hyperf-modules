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
namespace Cnpscy\HyperfModules;

use Cnpscy\HyperfModules\Command\ModuleMakeCommand;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'commands' => [
                Command\ModuleMakeCommand::class,
                // Command\ControllerCommand::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for hyperf-modules.',
                    'source' => __DIR__ . '/../publish/modules.php',
                    'destination' => BASE_PATH . '/config/autoload/modules.php',
                ],
            ],
        ];
    }
}
