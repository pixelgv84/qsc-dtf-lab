<?php

declare(strict_types=1);

namespace QSC\DTFLab\Core;

use QSC\DTFLab\Modules\Core\CoreServiceProvider;

final class Application
{
    private Container $container;

    private Kernel $kernel;

    public function __construct()
    {
        $this->container = new Container();

        $this->kernel = new Kernel($this->container);
    }

    /**
     * Inicia la aplicación.
     */
    public function boot(): void
    {
        $this->registerProviders();

        $this->kernel->boot();
    }

    /**
     * Registra todos los Service Providers del sistema.
     */
    private function registerProviders(): void
    {
        $this->kernel->add(

            new CoreServiceProvider(
                $this->container
            )

        );
    }

    /**
     * Devuelve el contenedor.
     */
    public function container(): Container
    {
        return $this->container;
    }

    /**
     * Devuelve el Kernel.
     */
    public function kernel(): Kernel
    {
        return $this->kernel;
    }
}