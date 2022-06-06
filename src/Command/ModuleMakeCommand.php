<?php

declare(strict_types=1);

namespace Cnpscy\HyperfModules\Command;

use Cnpscy\HyperfModules\Filesystem;
use Cnpscy\HyperfModules\Generators\ModuleGenerator;
use Cnpscy\HyperfModules\Module;
use Hyperf\Command\Annotation\Command;
use Hyperf\Filesystem\FilesystemFactory;
use Hyperf\Utils\ApplicationContext;
use Symfony\Component\Console\Input\InputArgument;

/**
 * @Command
 */
#[Command]
class ModuleMakeCommand extends BaseCommand
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
            ['force', InputArgument::OPTIONAL, 'The names of modules will be created.'],
        ];
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param  null|mixed  $id
     *
     * @return mixed|\Psr\Container\ContainerInterface
     */
    function di($id = null)
    {
        $container = ApplicationContext::getContainer();
        if ( $id ) {
            return $container->get($id);
        }
        return $container;
    }

    public function handle()
    {
        $name = $this->input->getArgument('name');
        $success = true;

        $config = $this->getConfig();
        if (!$config) return;

        $moduleGenerator = new ModuleGenerator($name, new Filesystem, $config);
        $code = with($moduleGenerator)
            ->setModule(new Module($moduleGenerator->getName(), $moduleGenerator->getModulePath()))
            ->setConsole($this)
            ->setForce($this->input->hasOption('force') ? $this->input->getOption('force') : false)
            ->generate();

        // if ($code === E_ERROR) {
        //     $success = false;
        // }
        //
        // return $success ? 0 : E_ERROR;
    }
}