<?php

declare(strict_types=1);

namespace QSC\DTFLab\Modules\Core;

final class AssetsManager
{
    public function boot(): void
    {
        add_action(
            'wp_enqueue_scripts',
            [$this, 'enqueue']
        );
    }

    public function enqueue(): void
    {
        // En el siguiente sprint leeremos el manifest.json de Vite.
    }
}