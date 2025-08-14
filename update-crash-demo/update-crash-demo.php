<?php
/**
 * Plugin Name: Demo-Plugin Update-Crash
 * Description: Demo-Plugin mit GitHub-Update-Funktion.
 * Version: 1.0.0
 * Author: Multiplecs e. U.
 * License: GPL2+
 * Update URI: https://github.com/DEIN-GITHUB-USER/mein-plugin
 */

if ( ! defined('ABSPATH') ) exit;

// === Plugin Update Checker laden ===
require __DIR__ . '/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// === Update-Checker konfigurieren ===
// Öffentliches Repo:
$updateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/Multiplecs/uni-software-schulung', // GitHub-Repo-URL
    __FILE__,                                          // Hauptdatei dieses Plugins
    'update-crash-demo'                                      // Plugin-Slug = Ordnername
);

// Branch festlegen (meist 'main' oder 'master')
$updateChecker->setBranch('main');

// === Falls privates Repo ===
 $updateChecker->setAuthentication('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');

 testfunction();