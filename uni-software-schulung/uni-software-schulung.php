<?php
/**
 * Plugin Name: Uni Software Schulung
 * Description: Demo-Plugin mit GitHub-Update-Funktion.
 * Version: 1.0.0
 * Author: Multiplecs e. U.
 * License: GPL2+
 * Update URI: https://github.com/Multiplecs/uni-software-schulung
 */

if ( ! defined('ABSPATH') ) exit;

// 1) PUC laden
require_once __DIR__ . '/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// 2) Update-Checker konfigurieren
$updateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/Multiplecs/uni-software-schulung', // Repo-URL
    __FILE__,                                              // Hauptdatei dieses Plugins
    'uni-software-schulung'                                // Slug = Ordnername in wp-content/plugins/
);

// 3) Branch setzen (an dein Repo anpassen: 'main' oder 'master')
$updateChecker->setBranch('main');

// 5) OPTIONAL (PRIVATES Repo): Token sicher setzen – NICHT im Code einchecken!
if (defined('MULTIPLECS_GH_TOKEN') && MULTIPLECS_GH_TOKEN) {
    $updateChecker->setAuthentication(MULTIPLECS_GH_TOKEN);
}

test();