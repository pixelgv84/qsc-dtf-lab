<?php

declare(strict_types=1);

namespace QSC\DTFLab\Core;

final class Kernel
{
    /**
     * @var ServiceProvider[]
     */
    private array $providers = [];

    public function __construct(
        private readonly Container $container
    ) {
    }

    public function add(ServiceProvider $provider): void
    {
        $provider->register();

        $this->providers[] = $provider;
    }

    public function boot(): void
    {
        foreach ($this->providers as $provider) {
            $provider->boot();
        }
    }

    public function container(): Container
    {
        return $this->container;
    }
}