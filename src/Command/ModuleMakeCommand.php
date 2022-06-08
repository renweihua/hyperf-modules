<?php

declare(strict_types=1);

namespace Cnpscy\HyperfModules\Command;

use Cnpscy\HyperfModules\Filesystem;
use Cnpscy\HyperfModules\Generators\ModuleGenerator;
use Cnpscy\HyperfModules\Module;
use Cnpscy\HyperfModules\Traits\ConfigTrait;
use Hyperf\Command\Annotation\Command;
use Hyperf\Utils\ApplicationContext;
use Symfony\Component\Console\Input\InputArgument;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Command\Command as HyperfCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @Command
 */
#[Command]
class ModuleMakeCommand extends HyperfCommand
{
    use ConfigTrait;

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
            ['module', InputArgument::REQUIRED, 'The names of modules will be created.'],
            ['force', InputArgument::OPTIONAL, 'The names of modules will be created.'],
        ];
    }

    public function handle()
    {
        $success = true;

        $module_name = $this->input->getArgument('module');
        $this->moduleGenerator = new ModuleGenerator($module_name, new Filesystem, $this->getConfig());

        $code = with($this->moduleGenerator)
            ->setModule(new Module($this->moduleGenerator->getName(), $this->moduleGenerator->getModulePath()))
            ->setConsole($this)
            ->setForce($this->input->hasOption('force') ? $this->input->getOption('force') : false)
            ->generate();

        if ($code === E_ERROR) {
            $success = false;
        }

        return $success ? 0 : E_ERROR;
    }

    protected function getStub(): string
    {
        return '';
    }

    protected function getDefaultNamespace(): string
    {
        $default_namespace = $this->getConfig()['namespace'] ?? 'App\\Controller';
        return $default_namespace . '\\' . $this->moduleGenerator->getModulePath();
    }
}