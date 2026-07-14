<?php

declare(strict_types=1);

namespace QSC\DTFLab\Core;

final class Application
{
    private Container $container;
    private Kernel $kernel;

    public function __construct()
    {
        $this->container = new Container();
        $this->kernel = new Kernel($this->container);
    }

    public function boot(): void
    {
        $this->registerProviders();

        add_action('init', function (): void {
            $this->kernel->boot();
        });
    }

    private function registerProviders(): void
{
    $this->kernel->add(
        new \QSC\DTFLab\Modules\Core\CoreServiceProvider(
            $this->container
        )
    );
}
}
