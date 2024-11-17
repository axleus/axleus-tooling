<?php

declare(strict_types=1);

namespace Axleus\Tooling;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'laminas-cli'  => $this->getConsoleConfig(),
        ];
    }

    public function getConsoleConfig(): array
    {
        return [
            'commands' => [
                'mezzio:handler:crud' => Handler\CreateCrudHandlerCommand::class,
                'mezzio:route:create' => Route\CreateRouteCommand::class,
            ],
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories'  => [
                Handler\CreateCrudHandlerCommand::class => Handler\CreateCrudHandlerCommandFactory::class,
                Route\CreateRouteCommand::class         => Route\CreateRouteCommandFactory::class,
            ],
        ];
    }
}
