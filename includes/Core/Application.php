<?php

declare(strict_types=1);

namespace QSC\DTFLab\Core;

final class Application
{
    private Assets $assets;

    private Shortcodes $shortcodes;

    public function __construct()
    {
        $this->assets = new Assets();

        $this->shortcodes = new Shortcodes();
    }

    public function boot(): void
    {
        $this->assets->register();

        $this->shortcodes->register();
    }
}