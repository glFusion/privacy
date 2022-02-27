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
    'access_denied'     => 'Přístup odepřen',
    'access_denied_msg' => 'Nemáte dostatečná bezpečnostní oprávnění pro přístup k této stránce.',
    'read'              => 'Přečetl(a) jsem a přijímám ',
    'and'               => 'a',
    'terms'             => 'Smluvní podmínky',
    'privacy_policy'    => 'Zásady ochrany osobních údajů',
    'reg_posttext'      => 'prohlášení.',
    'personal_data'     => 'Osobní údaje',
    'download'          => 'Stáhnout osobní údaje',
    'download_help'     => 'Exportovat osobní údaje uložené na tomto webu ve formátu XML.',
    'no_privacypolicy'  => 'Neodkazovat na zásady ochrany osobních údajů',
    'no_termsofuse'     => 'Neodkazovat na podmínky používání',
);

// Localization of the Admin Configuration UI
$LANG_configsections['privacy'] = array(
    'label' => 'Soukromí',
    'title' => 'Konfigurace soukromí'
);

$LANG_confignames['privacy'] = array(
    'cookieconsent' => 'Povolit panel souhlasu Cookie',
    'exportuser'    => 'Přidat exportovatované osobní údaje pod panel ochrany osobních údajů v mém účtu',
    'registrationlinks' => 'Přidat odkazy na Zásady ochrany osobních údajů / Podmínky použití přihlašovacích ůdajů',
    'privacypolicy' => 'Statická stránka Zásad ochrany osobních údajů',
    'termsofuse'   => 'Podmínky použití statické stránky',
    'cookiestyle' => 'Styl panelu cookie',
    'cookieposition' => 'Umístění panelu cookie',
    'cookietext' => 'Text pro panel cookie',
    'cookielearnmore' => 'Odkaz Dozvědět se více',
);

$LANG_configsubgroups['privacy'] = array(
    'sg_main' => 'Konfigurační nastavení'
);

$LANG_fs['privacy'] = array(
    'pv_settings' => 'Funkce ochrany soukromí',
    'pv_cookie'   => 'Nastavení souhlasu cookie',
);

$LANG_configSelect['privacy'] = array(
    0 => array(1 => 'Ano', 0 => 'Ne'),
    1 => array('bottom' => 'Spodní', 'top' => 'Nahoře', 'top_pushdown' => 'Nahoru (vyber)', 'bottom-right' => 'Obtéká doprava', 'bottom-left' => 'Obtéká zleva'),
    2 => array('block' => 'Bloky', 'classic' => 'Klasický', 'edgeless' => 'Bez okraje'),
);

$PLG_privacy_MESSAGE1 = 'Aktualizace Zásuvného modulu pro ochranu osobních údajů: Aktualizace byla úspěšně dokončena.';
$PLG_privacy_MESSAGE2 = 'Aktualizace Zásuvného modulu pro ochranu osobních údajů se nezdařila - zkontrolujte chybu.log';
$PLG_privacy_MESSAGE3 = 'Zásuvný modul pro ochranu osobních údajů byl úspěšně nainstalován';
?>