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

include $_CONF['path'].'plugins/privacy/privacy.php';

function privacy_upgrade()
{
    global $_TABLES, $_CONF, $_PV_CONF;

    $currentVersion = DB_getItem($_TABLES['plugins'],'pi_version',"pi_name='privacy'");

    switch( $currentVersion ) {
        case '1.0.0' :
            // fall through

        case '1.0.1' :
            // no changes

        case '1.0.2' :
            // no changes

        case '1.0.3' :
            // no changes

        default :
            DB_query("UPDATE {$_TABLES['plugins']} SET pi_version='".$_PV_CONF['pi_version']."',pi_gl_version='".$_PV_CONF['gl_version']."' WHERE pi_name='privacy' LIMIT 1");
            break;
    }
    if ( DB_getItem($_TABLES['plugins'],'pi_version',"pi_name='privacy'") == $_PV_CONF['pi_version']) {
        return true;
    } else {
        return false;
    }
}
?>