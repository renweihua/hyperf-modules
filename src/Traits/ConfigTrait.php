<?php

namespace Cnpscy\HyperfModules\Traits;

use Hyperf\Di\Annotation\Inject;

trait ConfigTrait
{
    /**
     * @Inject
     * @var \Hyperf\Contract\ConfigInterface
     */
    public $configInterface;

    public $config;

    protected function getConfig(): array
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
}