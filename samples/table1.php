<?php
/**
 * This file contains the sample of PHP HTML Object
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
require "../libs/HTML_Object.php";

$city = array('Jakarta', 'Bekasi', 'Tangerang', 'Bogor', 'Bandung');

// Defines HTML_Object() Class
$objHTML = new HTML_Object();

// Assigns HTML Table object
$objHTMLTable = clone $objHTML->Table;
$objHTMLTable->setClass('table-grid');

// Registers table row with the header columns
$objHTMLTable->row("row-head");
$objHTMLTable->row->head("No", array('width'=>'20'));
$objHTMLTable->row->head("City");
$objHTMLTable->apply();

// Looping proces for registering table row with the columns
$i = 0;
foreach ($city as $value) {
    $i++;
    $objHTMLTable->row("row-$i");
    $objHTMLTable->row->col($i.". ", array('align'=>'right'));
    $objHTMLTable->row->col($value);
    $objHTMLTable->apply();
}

// Fetches HTML Table and assigns to $table variable
$table .= $objHTMLTable->fetch();

// Assigns $body variable that contains HTML Tags is generated by HTML Object
$body = $objHTML->header("Indonesian City", 1);
$body .= $table;
$body = $objHTML->div($body, "content");

// {{{ Scripts for creating HTML Document
$objHTMLDocument = clone $objHTML->Document;
$objHTMLDocument->head();
$objHTMLDocument->head->title("HTML Object Sample - Table");
$objHTMLDocument->head->cssURL("includes/tables.css");
$objHTMLDocument->body();
$objHTMLDocument->body->content($body);
$objHTMLDocument->display();
// }}}
?>