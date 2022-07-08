<?php

declare(strict_types=1);

namespace Cnpscy\HyperfModules\Command;

use Cnpscy\HyperfModules\Filesystem;
use Cnpscy\HyperfModules\Generators\ModuleGenerator;
use Cnpscy\HyperfModules\Traits\ConfigTrait;
use Hyperf\Command\Annotation\Command;
use Hyperf\Utils\CodeGen\Project;
use Symfony\Component\Console\Input\InputArgument;

class ControllerCommand extends \Hyperf\Devtool\Generator\GeneratorCommand
{
    use ConfigTrait;

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
        return 'App\\Controller';
        $module_name = $this->input->getArgument('module');
        $moduleGenerator = new ModuleGenerator($module_name, null, $this->getConfig());
        // var_dump($moduleGenerator->getModulePath());
        // var_dump($this->getConfig());
        // 'paths.generator.controller.namespace'
        // exit;

        var_dump($this->getConfig());
        $default_namespace = $this->getConfig()['namespace'] ?? 'App\\Controller';
        var_dump($default_namespace);
        return $default_namespace . '\\';
    }
}
