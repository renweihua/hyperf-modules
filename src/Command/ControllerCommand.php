<?php

declare(strict_types=1);

namespace Cnpscy\HyperfModules\Command;

use Hyperf\Command\Annotation\Command;
use Hyperf\Utils\CodeGen\Project;
use Symfony\Component\Console\Input\InputArgument;

/**
 * @Command
 */
#[Command]
class ControllerCommand extends GeneratorCommand
{
    public function __construct()
    {
        parent::__construct('module:make-controller');
        $this->setDescription('Create a new controller class for the specified module.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The names of modules will be created.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
        ];
    }

    protected function getStub(): string
    {
        return $this->getConfig()['stub'] ?? __DIR__ . '/stubs/controller.stub';
    }

    protected function getDefaultNamespace(): string
    {
        $default_namespace = $this->getConfig()['namespace'] ?? 'App\\Controller';
        return $default_namespace . '\\';
    }
}
