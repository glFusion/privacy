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

global $_DB_table_prefix, $_TABLES;

// Plugin info

$_PV_CONF['pi_name']            = 'privacy';
$_PV_CONF['pi_display_name']    = 'privacy';
$_PV_CONF['pi_version']         = '1.0.4';
$_PV_CONF['gl_version']         = '1.7.4';
$_PV_CONF['pi_url']             = 'https://www.glfusion.org/';

?>