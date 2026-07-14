<?php

declare(strict_types=1);

namespace QSC\DTFLab\Core;

abstract class ServiceProvider
{
    public function __construct(
        protected Container $container
    ) {
    }

    /**
     * Registrar servicios en el contenedor.
     */
    abstract public function register(): void;

    /**
     * Ejecutar acciones una vez registrados todos los servicios.
     */
    public function boot(): void
    {
        // Opcional.
    }
}