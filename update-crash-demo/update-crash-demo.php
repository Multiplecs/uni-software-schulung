<?php
/**
 * Plugin Name: Update Crash Demo
 * Description: Demo mit GitHub-Updates.
 * Version: 1.0.0
 * Author: Multiplecs e. U.
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

// Flag-Option, die nach Aktivierung auf 1 gesetzt wird.
const PACD_OPTION = 'pacd_crash_after_activation';

// 1) Bei Aktivierung: Flag setzen (Aktivierung selbst läuft fehlerfrei durch)
register_activation_hook( __FILE__, function () {
    update_option( PACD_OPTION, 1, false );
});

// 2) Bei Deaktivierung: Flag entfernen (damit nach Re-Aktivierung von vorne begonnen werden kann)
register_deactivation_hook( __FILE__, function () {
    delete_option( PACD_OPTION );
});

// 3) Nach dem Laden der Plugins prüfen wir das Flag und crashen hart,
//    damit der „kritische Fehler“ von WordPress erscheint.
add_action( 'plugins_loaded', function () {
    // Sicherheits-Bypass (falls du dich aussperrst): ?pacd_bypass=1 an die URL hängen
    if ( isset($_GET['pacd_bypass']) && $_GET['pacd_bypass'] == '1' ) {
        return;
    }

    // Nur crashen, wenn Flag gesetzt ist und das Plugin aktiv ist
    if ( get_option( PACD_OPTION ) ) {
        // ABSICHTLICHER FATAL ERROR:
        // Aufruf einer nicht existierenden Funktion -> klassischer PHP-Fatal Error.
        pacd_totally_nonexistent_function();
    }
}, 999);
