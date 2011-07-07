<?php
/**
 * This file contains the sample of PHP HTML Object Extension
 *
 * PHP HTML Object is PHP Object Library for making autogenerated HTML code
 * over PHP Programming. Providing the variety of needs to make HTML code
 * automatically, such as HTML Tags, Attributes, Tag's Content, Frequently Used Tags,
 * and Other HTML Object.
 *
 * @author      Abdul Hanan (http://hanan.qummatic.com)
 * @copyright   2010 bekasi-code.qummatic.com
 * @license     http://creativecommons.org/licenses/GPL/2.0/ CC-GNU GPL version 2 or later
 * @version     ver 0.1
 * @link        http://bekasi-code.qummatic.com/html-object
 *
 */

// Requires HTML Object Class Library
require "../../libs/HTML_Object.php";

$content = '';

$objHTML = new HTML_Object();
$content .= $objHTML->header('Generating web form with xml');
// {{{ generating web form with xml file
$webform = new HO_Webform();
$webform->type = 'xml';
$webform->path = dirname(__FILE__) . '/data';
$webform->generate('webform.xml');
$content .= $webform->fetch();
// }}}
$content .= $objHTML->header('Generating web form with array');
// {{{ generating web form with array
// {{{ fields information
$webform = new HO_Webform();
$webform->type = 'array';
$webform->path = dirname(__FILE__) . '/data';
$webform->generate('webform_array.php');
$content .= $webform->fetch();
// }}}

$objHTMLDocument = clone $objHTML->Document;
$objHTMLDocument->head();
$objHTMLDocument->head->title("HTML Object Sample - Document");
$objHTMLDocument->head->cssURL("../includes/webform.css");
$objHTMLDocument->body();
$objHTMLDocument->body->content($content);
$objHTMLDocument->display();
?>
