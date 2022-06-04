<?php

declare(strict_types=1);

namespace Cnpscy\HyperfModules\Command;

use Hyperf\Devtool\Generator\GeneratorCommand;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Symfony\Component\Console\Input\InputArgument;

/**
 * @Command
 */
#[Command]
class ModuleMakeCommand extends GeneratorCommand
{
    public function __construct()
    {
        parent::__construct('module:make');
        $this->setDescription('Create a new module.');
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
        ];
    }

    public function handle()
    {
        var_dump($this->input->getArguments());
    }

    protected function getStub(): string
    {
        return $this->getConfig()['stub'] ?? __DIR__ . '/stubs/controller.stub';
    }

    protected function getDefaultNamespace(): string
    {
        return $this->getConfig()['namespace'] ?? 'App\\Controller';
    }
}