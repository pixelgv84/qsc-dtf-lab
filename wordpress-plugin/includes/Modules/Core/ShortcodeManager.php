<?php

declare(strict_types=1);

namespace QSC\DTFLab\Modules\Core;

final class ShortcodeManager
{
    public function boot(): void
    {
        add_shortcode(
            'qsc_dtf_lab',
            [$this, 'render']
        );
    }

    public function render(): string
    {
        ob_start();

        include QSC_DTF_PLUGIN_PATH . 'templates/app.php';

        return (string) ob_get_clean();
    }
}