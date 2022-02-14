<?php
/**
 * glFusion Privacy Plugin
 *
 * Additional Privacy Controls for glFusion
 *
 * LICENSE: This program is free software; you can redistribute it
 *  and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * @category   glFusion CMS
 * @package    glFusion
 * @author     Mark R. Evans  mark AT glFusion DOT org
 * @copyright  2018-2022 - Mark R. Evans
 * @license    http://opensource.org/licenses/gpl-2.0.php - GNU Public License v2 or later
 *
 */

if (!defined ('GVERSION')) {
    die ('This file can not be used on its own.');
}

$LANG_PRIVACY = array (
    'access_denied'     => 'Brak dostępu',
    'access_denied_msg' => 'Nie masz odpowiedniego prawa dostępu do tej strony.',
    'read'              => 'Przeczytałem i zgadzam się na ',
    'and'               => 'i',
    'terms'             => 'Zasady i Warunki',
    'privacy_policy'    => 'Politykę Prywatności',
    'reg_posttext'      => 'na tej stronie.',
    'personal_data'     => 'Dane Osobiste',
    'download'          => 'Pobierz',
    'download_help'     => 'Wyeksportuj dane osobowe przechowywane na tej stronie w formacie XML.',
    'no_privacypolicy'  => 'Nie łącz z Polityką Prywatności',
    'no_termsofuse'     => 'Nie łącz z Warunkami Użytkowania',
);

// Localization of the Admin Configuration UI
$LANG_configsections['privacy'] = array(
    'label' => 'Prywatność',
    'title' => 'Konfiguracja Prywatności'
);

$LANG_confignames['privacy'] = array(
    'cookieconsent' => 'Włącz pasek zgody pliki cookie',
    'exportuser'    => 'Dodaj eksport danych osobowych do panelu prywatności mojego konta',
    'registrationlinks' => 'Dodaj linki do Polityki Prywatności / Warunki Użytkowania do ekranu rejestracji',
    'privacypolicy' => 'Polityka Prywatności Strona Statyczna',
    'termsofuse'   => 'Warunki Użytkowania Strona Statyczna',
    'cookiestyle' => 'Cookie Styl',
    'cookieposition' => 'Cookie Bar Lokalizacja',
    'cookietext' => 'Tekst do paska Cookies',
    'cookielearnmore' => 'Dowiedz Się Więcej',
);

$LANG_configsubgroups['privacy'] = array(
    'sg_main' => 'Ustawienia Konfiguracji'
);

$LANG_fs['privacy'] = array(
    'pv_settings' => 'Funkcje Prywatności',
    'pv_cookie'   => 'Zgoda na ustawienia plików cookie',
);

$LANG_configSelect['privacy'] = array(
    0 => array(1 => 'True', 0 => 'False'),
    1 => array('bottom' => 'Bottom', 'top' => 'Top', 'top_pushdown' => 'Top (pushdown)', 'bottom-right' => 'Float Right', 'bottom-left' => 'Float Left'),
    2 => array('block' => 'Block', 'classic' => 'Classic', 'edgeless' => 'Edgeless'),
);

$PLG_privacy_MESSAGE1 = 'Aktualizacja wtyczki prywatności: Aktualizacja zakończona powodzeniem.';
$PLG_privacy_MESSAGE2 = 'Aktualizacja wtyczki nie powiodła się - sprawdź error.log';
$PLG_privacy_MESSAGE3 = 'Wtyczka prywatności została pomyślnie zainstalowana';
?>