<?php
/**
 * Plugin Name: QSC DTF Lab
 * Plugin URI: https://github.com/pixelgv84/qsc-dtf-lab
 * Description: Professional DTF Image Preparation Studio.
 * Version: 0.1.0
 * Requires at least: 6.5
 * Requires PHP: 8.2
 * Author: Quito Street Colors
 * License: GPL-2.0-or-later
 * Text Domain: qsc-dtf-lab
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

define('QSC_DTF_VERSION', '0.1.0');
define('QSC_DTF_PLUGIN_FILE', __FILE__);
define('QSC_DTF_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('QSC_DTF_PLUGIN_URL', plugin_dir_url(__FILE__));

$autoload = QSC_DTF_PLUGIN_PATH . 'vendor/autoload.php';

if (!file_exists($autoload)) {
    add_action('admin_notices', function (): void {
        echo '<div class="notice notice-error"><p><strong>QSC DTF Lab:</strong> Ejecuta <code>composer install</code> antes de activar el plugin.</p></div>';
    });

    return;
}

require_once $autoload;

$app = new QSC\DTFLab\Core\Application();
$app->boot();