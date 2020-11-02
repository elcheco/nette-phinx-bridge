<?php

namespace ElCheco\Phinx;

use Nette\DI\CompilerExtension;
use Phinx\Config\Config;
use ElCheco\Phinx\Commands\Breakpoint;
use ElCheco\Phinx\Commands\Create;
use ElCheco\Phinx\Commands\Migrate;
use ElCheco\Phinx\Commands\Rollback;
use ElCheco\Phinx\Commands\SeedCreate;
use ElCheco\Phinx\Commands\SeedRun;
use ElCheco\Phinx\Commands\Status;

/**
 * Class Extension
 * @package ElCheco\Phinx
 * @author  Miroslav Koula <mkoula@gmail.com>
 */
class Extension extends CompilerExtension
{
	/** @var array */
    private static $commands = [
        Create::class,
        Migrate::class,
        Rollback::class,
        Status::class,
        Breakpoint::class,
        SeedCreate::class,
        SeedRun::class,
    ];

    public function loadConfiguration()
    {
        $builder = $this->getContainerBuilder();

        $builder
            ->addDefinition($this->prefix('config'))
            ->setFactory(Config::class, [$this->getConfig()]);

        foreach (static::$commands as $class) {
            $name = lcfirst(str_replace('ElCheco\Phinx\Commands\\', '', $class));
            $command = $this->name . ':' . strtolower(preg_replace('#([a-z])([A-Z])#', '$1:$2', $name));

            $builder
                ->addDefinition($this->prefix('console.commands.' . $name))
                ->setFactory($class)
                ->addSetup('setName', [$command])
                ->addSetup('setConfig', [$this->prefix('@config')])
                ->addTag('console.command: phinx:' . $name);
        }
    }
}