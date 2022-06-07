<?php

declare(strict_types=1);

namespace Cnpscy\HyperfModules\Command;

use Cnpscy\HyperfModules\Filesystem;
use Cnpscy\HyperfModules\Generators\ModuleGenerator;
use Cnpscy\HyperfModules\Module;
use Hyperf\Command\Annotation\Command;
use Hyperf\Utils\ApplicationContext;
use Symfony\Component\Console\Input\InputArgument;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Command\Command as HyperfCommand;

/**
 * @Command
 */
#[Command]
class ModuleMakeCommand extends HyperfCommand
{
    /**
     * @Inject
     * @var \Hyperf\Contract\ConfigInterface
     */
    public $configInterface;

    /**
     * @Inject
     * @var \League\Flysystem\Filesystem
     */
    public $filesystem;


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

    public $config;

    public function getConfig()
    {
        if (empty($this->config)){
            // 获取配置信息
            if ($this->configInterface){
                $this->config = $this->configInterface->get('modules', []);
            }
        }
        if (empty($this->config)){
            return $this->error('请执行[发布配置文件]：`php bin/hyperf.php vendor:publish cnpscy/hyperf-modules`');
        }
        return $this->config;
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

        if ($code === E_ERROR) {
            $success = false;
        }

        return $success ? 0 : E_ERROR;
    }
}