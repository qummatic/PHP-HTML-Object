<?php
/**
 * This file contains the code for initializing HTML Object extension
 * 
 * PHP HTML Object is PHP Object Library for making autogenerated HTML code
 * over PHP Programming. Providing the variety of needs to make HTML code
 * automatically, such as HTML Tags, Attributes, Tag's Content, Frequently Used Tags,
 * and Other HTML Object.
 *
 * PHP Versions 5
 *
 * @author      Abdul Hanan (http://hanan.qummatic.com) Original Author
 * @copyright   2011 bekasi-code.qummatic.com
 * @license     http://www.gnu.org/licenses/lgpl-3.0.txt LGPL Version 3
 * @version     ver 0.2
 * @link        http://bekasi-code.qummatic.com/html-object
 *
 */

if (!defined('_IS_HO_INIT_'))
    die("You can't call file 'extension.php' directly, please call file 'HTML_Object.php'");

$extensionPath = _LIBS_HTML_OBJECT_EXTENSION_;
$openPath = opendir($extensionPath);
while (false !== ($extensionFile = readdir($openPath))) {
    if (!is_dir($extensionPath . '/' . $extensionFile)) {
        include $extensionPath . DIRECTORY_SEPARATOR . $extensionFile;
    }
}
closedir($openPath);

?>