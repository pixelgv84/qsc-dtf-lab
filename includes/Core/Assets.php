<?php

declare(strict_types=1);

namespace QSC\DTFLab\Core;

final class Assets
{
    private string $handle = 'qsc-dtf-lab';

    public function register(): void
    {
        add_action(
            'wp_enqueue_scripts',
            [$this, 'enqueue']
        );
    }

    public function enqueue(): void
    {
        $manifestPath = QSC_DTF_PLUGIN_PATH . 'assets/build/.vite/manifest.json';

        if (! file_exists($manifestPath)) {
            return;
        }

        $manifest = json_decode(
            (string) file_get_contents($manifestPath),
            true
        );

        if (! is_array($manifest)) {
            return;
        }

        if (! isset($manifest['index.html'])) {
            return;
        }

        $entry = $manifest['index.html'];

        if (isset($entry['css'])) {

            foreach ($entry['css'] as $css) {

                wp_enqueue_style(
                    $this->handle,
                    QSC_DTF_PLUGIN_URL . 'assets/build/' . $css,
                    [],
                    QSC_DTF_VERSION
                );

            }

        }

        wp_enqueue_script(
            $this->handle,
            QSC_DTF_PLUGIN_URL . 'assets/build/' . $entry['file'],
            [],
            QSC_DTF_VERSION,
            true
        );

        wp_script_add_data(
            $this->handle,
            'type',
            'module'
        );
    }
}