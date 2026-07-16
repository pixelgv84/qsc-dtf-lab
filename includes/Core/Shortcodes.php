<?php

declare(strict_types=1);

namespace QSC\DTFLab\Core;

final class Shortcodes
{
    public function register(): void
    {
        add_shortcode(
            'qsc_dtf_lab',
            [$this, 'render']
        );
    }

    public function render(): string
    {
        ob_start();

        View::render('app');

        return (string) ob_get_clean();
    }
}