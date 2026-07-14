<?php

declare(strict_types=1);

namespace QSC\DTFLab\Modules\Core;

use QSC\DTFLab\Core\ServiceProvider;

final class CoreServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->container->singleton(
            AssetsManager::class,
            fn () => new AssetsManager()
        );

        $this->container->singleton(
            ShortcodeManager::class,
            fn () => new ShortcodeManager()
        );
    }

    public function boot(): void
    {
        $this->container->get(AssetsManager::class)->boot();
        $this->container->get(ShortcodeManager::class)->boot();
    }
}