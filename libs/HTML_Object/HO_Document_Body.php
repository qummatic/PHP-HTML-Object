<?php
/**
 * This file contains the code for creating HEAD Tags, the attributes, and
 * innerHTML contents
 *
 * PHP HTML Object is PHP Object Library for making autogenerated HTML code
 * over PHP Programming. Providing the variety of needs to make HTML code
 * automatically, such as HTML Tags, Attributes, Tag's Content, Frequently Used Tags,
 * and Other HTML Object.
 *
 * PHP Versions 5
 *
 * @category    PHP Object
 * @package     HTML Object
 * @author      Abdul Hanan (http://hanan.qummatic.com) Original Author
 * @copyright   2011 bekasi-code.qummatic.com
 * @license     http://www.gnu.org/licenses/lgpl-3.0.txt LGPL Version 3
 * @version     ver 0.2-dev
 * @link        http://bekasi-code.qummatic.com/html-object
 *
 */

/**
 * HTML Document Object - BODY Element Class
 * 
 * This class is used for generating HEAD tags, its attributes
 * and its innerHTML contents.
 *
 * @subpackage HTML Document
 * @access private
 * @version class-ver 0.2-dev
 * @author Abdul Hanan (http://hanan.qummatic.com)
 */
class HO_Document_Body extends HO_Document
{
    /**
     * @var     string
     * @access  private
     */
    private $documentBody;

    /**
     * Constructor of the container class
     *
     * @access public
     */
    public function __construct()
    {

    }

    /**
     * Processes BODY Element
     *
     * Scripts for processing to create BODY element, its attributes and its contents
     *
     * @access private
     * @return mixed
     */
    private function process()
    {
        //$this->documentBody = "";

    }

    /**
     * Assigns HTML contents
     * 
     * @access public
     * @param string $argContent
     */
    public function content($argContent)
    {
        $this->documentBody = $argContent;
        
    }

    /**
     * Fetches BODY elements
     * 
     * Returns BODY elements, its attributes, and its contents
     *
     * @access public
     * @return string
     */
    public function fetch()
    {
        $this->process();

        return $this->documentBody;
    }

    /**
     * Displays BODY elements
     * 
     * Displays BODY elements, its attributes, and its contents
     *
     * @access public
     */
    public function display()
    {
        echo $this->fetch();
    }
}
?>
