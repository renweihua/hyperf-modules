<?php

declare(strict_types=1);

namespace Cnpscy\HyperfModules\Command;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Di\Annotation\Inject;

abstract class BaseCommand extends HyperfCommand
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

    protected function getStub(): string
    {
        return $this->getConfig()['stubs'] ?? __DIR__ . '/stubs/controller.stub';
    }

    protected function getDefaultNamespace(): string
    {
        return $this->getConfig()['namespace'] ?? 'App\\Controller';
    }
}