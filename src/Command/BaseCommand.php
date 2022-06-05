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

    public $config;

    public function getConfig(): array
    {
        if (empty($this->config)){
            // 获取配置信息
            if ($this->configInterface){
                $this->config = $this->configInterface->get('modules', []);
            }
        }
        return empty($this->config) ? [] : $this->config;
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