<?php

declare(strict_types=1);

namespace Cnpscy\HyperfModules\Command;

use Cnpscy\HyperfModules\Generators\ModuleGenerator;
use Hyperf\Devtool\Generator\GeneratorCommand;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
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
            ['name', InputArgument::OPTIONAL, 'The names of modules will be created.'],
        ];
    }

    public function handle()
    {
        $name = $this->input->getArgument('name');
        $success = true;

        $dir_name = $this->getConfig()['paths']['modules'] . '/' . $name;
        if (is_dir($dir_name)){
            return $this->error('The Module [' . $name . '] already exist！');
        }

        // 创建目录
        mkdir($dir_name, 0755);


        // $code = with(new ModuleGenerator($name))->generate();

        // if ($code === E_ERROR) {
        //     $success = false;
        // }
        //
        // return $success ? 0 : E_ERROR;
    }
}