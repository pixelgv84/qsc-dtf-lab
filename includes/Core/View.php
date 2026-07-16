<?php

declare(strict_types=1);

namespace QSC\DTFLab\Core;

final class View
{
    public static function render(
        string $template,
        array $data = []
    ): void {

        extract(
            $data,
            EXTR_SKIP
        );

        include QSC_DTF_PLUGIN_PATH .
            'templates/' .
            $template .
            '.php';

    }
}