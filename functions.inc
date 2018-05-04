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
 * @copyright  2018 - Mark R. Evans
 * @license    http://opensource.org/licenses/gpl-2.0.php - GNU Public License v2 or later
 *
 */

if (!defined ('GVERSION')) {
    die ('This file can not be used on its own.');
}

// load the language file(s), including custom strings if any

$langfile = $_CONF['path'].'plugins/privacy/language/' . $_CONF['language'] . '.php';
$custfile = $_CONF['path'].'plugins/privacy/language/custom/' . $_CONF['language'] . '.php';

if (file_exists($langfile)) {
    include_once $langfile;
    if (file_exists($custfile)) {
        include_once $custfile;
    }
} else {
    $langfile = $_CONF['path'].'plugins/privacy/language/english.php';
    $custfile = $_CONF['path'].'plugins/privacy/language/custom/english.php';
    include_once $langfile;
    if (file_exists($custfile)) {
        include_once $custfile;
    }
}

$pv_config = config::get_instance();
$_PV_CONF = $pv_config->get_config('privacy');

require_once $_CONF['path'].'plugins/privacy/privacy.php';

/**
 * Return plugin's version information
 *
 * @return  string   plugin version number
 */
function plugin_chkVersion_privacy() {
    global $_PV_CONF;

    return $_PV_CONF['pi_version'];
}

/**
 * Upgrade plugin
 *
 * @return  string   plugin version number
 */
function plugin_upgrade_privacy() {
    global $_CONF, $_TABLES;

    require_once $_CONF['path'].'plugins/privacy/upgrade.php';

    return privacy_upgrade();
}


/**
 * Adds Download Personal Data button to Privacy panel in account profile
 *
 * @return  string   formatted HTML for display
 */
function plugin_profileedit_privacy($uid,$panel,$fieldset)
{
    global $_CONF, $LANG_PRIVACY;

    $retval = '';

    if ( COM_isAnonUser() ) {
        return $retval;
    }

    if ( $panel == 'privacy' && $fieldset == 'privacy' ) {

        $token = SEC_createTokenGeneral('export');

        $T = new Template($_CONF['path'] . 'plugins/privacy/templates/');
        $T->set_file ('profilehook','profile.thtml');
        $T->set_var (array(
                'lang_personal_data'    => $LANG_PRIVACY['personal_data'],
                'lang_download'         => $LANG_PRIVACY['download'],
                'lang_download_help'    => $LANG_PRIVACY['download_help'],
                'token'                 => $token,
        ));

        $T->parse ('output', 'profilehook');
        $retval = $T->finish ($T->get_var('output'));

        return $retval;
    }

    if ($panel != '' || $fieldset != '' ) {
        return $retval;
    }
    return $retval;
}

/**
 * Adds links to privacy policy and terms of use to registration, if they exist
 *
 * @return  string   formatted HTML for display
 */
function plugin_templatesetvars_privacy($templatename, $template)
{
    global $_CONF, $_TABLES, $_PLUGIN_INFO, $LANG_PRIVACY, $LANG_STATIC;

    if ( $templatename != 'registration') return;

    if ( !isset($_PLUGIN_INFO['staticpages'])) return;

    $retval = '';
    $termsOfUse = '';
    $privacyPolicy = '';

    $id = DB_getItem($_TABLES['staticpage'],'sp_id',"sp_id='terms-of-use'");
    if ( $id != '' ) {
        $url = COM_buildUrl( $_CONF['site_url'] . '/page.php?page=' . 'terms-of-use');
        $termsOfUse = COM_createLink($LANG_PRIVACY['terms'], $url,array('target'=>'_blank','title'=>$LANG_STATIC['title_display']));
    }

    $id = DB_getItem($_TABLES['staticpage'],'sp_id',"sp_id='privacy-policy'");
    if ( $id != '' ) {
        $url = COM_buildUrl( $_CONF['site_url'] . '/page.php?page=' . 'privacy-policy');
        $privacyPolicy = COM_createLink($LANG_PRIVACY['privacy_policy'], $url,array('target'=>'_blank','title'=>$LANG_STATIC['title_display']));
    }

    if ($privacyPolicy != '' || $termsOfUse != '' ) {
        $T = new Template($_CONF['path'] . 'plugins/privacy/templates/');
        $T->set_file ('registrationhook','registration.thtml');
        $T->set_var (array(
                'lang_read'             => $LANG_PRIVACY['read'],
                'lang_and'              => $LANG_PRIVACY['and'],
        ));
        if ( $termsOfUse != '' ) {
            $T->set_var('termsofuse', $termsOfUse);
        }
        if ( $privacyPolicy != '' ) {
            $T->set_var('privacypolicy',$privacyPolicy);
        }

        $T->parse ('output', 'registrationhook');
        $retval = $T->finish ($T->get_var('output'));
    }
    $template->set_var('plugin_fields', $retval);
}


/**
 * Exports user data in XML format
 *
 * @return  string   formatted HTML for display
 */
function PRIVACY_export()
{
    global $_CONF, $_TABLES, $_USER, $LANG_PRIVACY, $LANG_CHARSET;

    if ( COM_isAnonUser() ) die();

    if ( !isset($_GET['t'])) die();

    $token = COM_applyFilter($_GET['t']);
    if (!SEC_checkTokenGeneral($token,'export',$_USER['uid'])) die();

    // account profile information to export

    $toExport = array('uid','username','remoteusername','remoteservice','fullname','email','homepage','sig','regdate','photo','remote_ip','tzid','emailstories','emailfromadmin','emailfromuser','showonline','search_result_format','about','location','pgpkey','userspace','totalcomments','lastlogin');

    $exportData = '';
    foreach ($_USER AS $item => $value) {
        if ( in_array($item,$toExport) ) {
            if ( $item == 'lastlogin' ) {
                $dt = new Date('now',$_USER['tzid']);
                $value = $dt->format($dt->getUserFormat(),true);
            }
            $exportData .= '<'.$item.'>'.addSlashes($value).'</'.$item.'>'.LB;
        }
    }

    $pluginData = PLG_privacyExport($_USER['uid'],$_USER['email'],$_USER['username'],$_USER['remote_ip']);

    header("Content-type: application/octet-stream");
    header("Content-Disposition: inline; filename=\"userinfo.xml\"");
	echo "<?xml version=\"1.0\" encoding=\"" . $LANG_CHARSET . "\"?>\n";
	echo "<userData>\n";
	echo "<userProfile>\n";
	echo $exportData;
    echo "</userProfile>\n";

    if ( $pluginData != '' ) {
        echo $pluginData;
    }
    echo "</userData>";

    die();
}

// function for testing - disabled in prod
function plugin_privacy_export_privacyXX($uid,$email='',$username='',$ip='')
{
    $retval = '';

    $retval .= "<forum>\n";
    $retval .= "<post>Some post data</post>\n";
    $retval .= "<post>Some more post data</post>\n";
    $retval .= "</forum>\n";

    return $retval;
}

?>