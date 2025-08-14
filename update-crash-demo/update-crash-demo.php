<?php
/**
 * Plugin Name: Mein Plugin
 * Description: Demo mit GitHub-Updates.
 * Version: 1.0.0
 * Author: Ich
 * License: GPL2+
 * Update URI: https://github.com/dein-user/mein-plugin  ; // signalisiert: nicht von wp.org updaten
 */

if ( ! defined('ABSPATH') ) exit;

// PUC laden
require __DIR__ . '/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// === GitHub-Integration ===
// Öffentliches Repo (ohne Token):
$updateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/Multiplecs/uni-software-schulung', // Repo-URL
    __FILE__,                                   // Hauptdatei
    'update-crash-demo'                               // Slug = Plugin-Ordnername
);

// Branch setzen (meist 'main' oder 'master')
$updateChecker->setBranch('main');

// OPTIONAL: Privat-Repo → Token setzen (siehe Abschnitt 4)
 $updateChecker->setAuthentication('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');
