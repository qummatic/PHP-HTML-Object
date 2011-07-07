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
 * HTML Document Object - HEAD Element Class
 * 
 * This class is used for generating HEAD element, its attributes
 * and its contents.
 *
 * @subpackage HTML Document
 * @access private
 * @version class-ver 0.2-dev
 * @author Abdul Hanan (http://hanan.qummatic.com)
 */
class HO_Document_Head extends HO_Document
{
    /**#@+*/
    /**
     * @var     string
     * @access  private
     */
    private $documentHead;
    private $doctypeHead;
    /**#@-*/
    
    /**#@+*/
    /**
     * @var     array
     * @access  private
     */    
    private $arrHeadContent = array();
    private $arrHeadMeta = array();
    private $arrHeadLink = array();
    private $arrHeadScript = array();
    private $arrHeadStyle = array();
    /**#@-*/
    
    /**
     * Constructor of the container class
     *
     * @access public
     * @param array $argData
     */
    public function __construct($argData = array())
    {
        parent::__construct();
        $this->doctypeHead = '';
        if (isset($argData['doctype']) && !is_null($argData['doctype']) && trim($argData['doctype']))
            $this->doctypeHead = $argData['doctype'];
    }

    /**
     * Processes HEAD Element
     *
     * Scripts for processing to create HEAD element, its attributes and its contents.
     *
     * @access private
     */
    private function process()
    {
        // Head Content
        foreach ($this->arrHeadContent as $value) {
            $this->documentHead .= "\t".$value;
        }

        // Head Meta
        foreach ($this->arrHeadMeta as $value) {
            $this->documentHead .= "\t".$value;
        }

        // Head Link
        foreach ($this->arrHeadLink as $value) {
            $this->documentHead .= "\t".$value;
        }

        // Head Script
        foreach ($this->arrHeadScript as $value) {
            $this->documentHead .= "\t".$value;
        }

        // Head Style
        foreach ($this->arrHeadStyle as $value) {
            $this->documentHead .= "\t".$value;
        }
    }

    /**
     * Defines TITLE tag
     * 
     * Assigns TITLE tag content into HEAD element content
     *
     * @access public
     * @param  string $argTitle
     */
    public function title($argTitle)
    {
        $tagTitle = $this->__title();
        $tagTitle->innerHTML($argTitle);
        $this->arrHeadContent[] = $tagTitle->fetch();
        return $this;
    }

    /**
     * Defines custom contents
     * 
     * Assigns custom contents into HEAD element content.
     *
     * @access public
     * @param  string $argContent
     */
    public function content($argContent)
    {
        $this->arrHeadContent[] = $argContent;
        return $this;
    }

    /**
     * Defines META tag
     * 
     * Assigns META tag into HEAD element content.
     *
     * @access public
     * @param string $argType two attribute types is 'http-equiv' and 'name'
     * @param string $argName
     * @param string $argContent
     * @param array $argAttributes
     */
    public function meta($argType, $argName, $argContent, $argAttributes = array())
    {
        $tagMeta = $this->__meta();
        if ($argType == "http-equiv") {
            $tagMeta->attribute('http-equiv', $argName);
        }
        else {
            $tagMeta->attribute('name', $argName);
        }
        $tagMeta->attribute('content', $argContent);
        
        foreach ($argAttributes as $key => $value) {
            $tagMeta->attribute($key, $value);
        }
        
        $this->arrHeadMeta[] = $tagMeta->fetch();
        return $this;
    }

    /**
     * Defines META's name attribute value
     * 
     * Assigns META's name attribute value and its content attribute value
     * 
     * @access public
     * @param string $argName
     * @param string $argContent
     * @param array $argAttributes
     */
    public function metaName($argName, $argContent, $argAttributes = array())
    {
        $this->meta("name", $argName, $argContent, $argAttributes);
        return $this;
    }

    /**
     * Defines META's http-equiv attribute value
     * 
     * Assigns META's http-equiv attribute value and its content attribute value
     * attributes
     * 
     * @access public
     * @param string $argName
     * @param string $argContent
     * @param array $argAttributes
     */
    public function metaHTTPEquiv($argName, $argContent, $argAttributes = array())
    {
        $this->meta("http-equiv", $argName, $argContent, $argAttributes);
        return $this;
    }

    /**
     * Defines META-KEYWORD 
     * 
     * Assigns META's name attribute which its value is keyword and a keyword's
     * value
     *
     * @access public
     * @param string $argContent
     */
    public function keyword($argContent)
    {
        $this->metaName("keyword", $argContent);
        return $this;
    }

    /**
     * Defines META-DESCRIPTION
     * 
     * Assigns META's name attribute which its value is description and
     * a description's value
     *
     * @access public
     * @param string $argContent
     */
    public function description($argContent)
    {
        $this->metaName("description", $argContent);
        return $this;
    }

    /**
     * Defines META-AUTHOR
     * 
     * Assigns META's name attribute which its value is author and
     * an author's value
     *
     * @access public
     * @param string $argContent
     */
    public function author($argContent)
    {
        $this->metaName("author", $argContent);
        return $this;
    }

    /**
     * Defines META-ROBOT
     * 
     * Assigns META's name attribute which its value is robots and
     * a robots' value
     *
     * @access public
     * @param string $argContent
     */
    public function robots($argContent)
    {
        $this->metaName("robots", $argContent);
        return $this;
    }

    /**
     * Defines LINK Tag
     * 
     * Assigns LINK Tag into the HEAD element content
     *
     * @access public
     * @param string $argRel
     * @param string $argType
     * @param string $argHRef
     * @param array $argAttributes
     */
    public function link($argRel, $argType, $argHRef, $argAttributes = array())
    {
        $tagLink = $this->__link();
        
        $tagLink->attribute('rel', $argRel);
        $tagLink->attribute('type', $argType);
        $tagLink->attribute('href', $argHRef);

        foreach ($argAttributes as $key => $value) {
            $tagLink->attribute($key, $value);
        }

        $this->arrHeadLink[] = $tagLink->fetch();
        return $this;
    }

    /**
     * Defines link of css
     * 
     * Inserts link of css into HEAD element content
     *
     * @access public
     * @param string $argHRef
     * @param array $argAttributes
     */
    public function cssURL($argHRef, $argAttributes = array())
    {
        $this->link("stylesheet", "text/css", $argHRef, $argAttributes);
        return $this;
    }

    /**
     * Defines SCRIPT Tags
     * 
     * Assigns SCRIPT Tags into HEAD element content
     *
     * @access public
     * @param string $argLanguageType
     * @param string $argContent
     * @param string $argType two types is 'source' to insert link of client-based 
     *        scripts or 'script' to insert client-based script into SCRIPT element content
     * @param array $argAttributes
     */
    public function script($argLanguageType, $argContent, $argType = "script", $argAttributes = array())
    {
        $tagScript = $this->__script();

        $tagScript->attribute('type', $argLanguageType);

        if ($argType == "source") {
            $tagScript->attribute('src', $argContent);
            $tagScript->innerHTML("");
        }
        else {
            if ($this->doctypeHead == 'xhtml1.1' || $this->doctypeHead == 'xhtml1.0-frameset' || $this->doctypeHead == 'xhtml1.0-transitional' || $this->doctype == 'xhtml1.0-strict') {
                $content = '//<![CDATA[' . "\n";
                $content .= $argContent;
                $content .= "\n" . '//]]>';
                $tagScript->innerHTML($content);
            }
            else {
                $tagScript->innerHTML("<!--\n" . $argContent . "\n-->");
            }
        }

        foreach ($argAttributes as $key => $value) {
            $tagScript->attribute($key, $value);
        }

        $this->arrHeadScript[] = $tagScript->fetch();
        return $this;
    }

    /**
     * Defines JavaScript's script
     * 
     * Inserts JavaScript's script into SCRIPT element contents
     *
     * @access public
     * @param string $argScript
     */
    public function js($argScript)
    {
        $this->script("text/javascript", $argScript, "script");
        return $this;
    }

    /**
     * Defines link of JavaScript
     * 
     * Inserting link of JavaScript into HEAD element content
     *
     * @access public
     * @param string $argSource
     */
    public function jsURL($argSource)
    {
        $this->script("text/javascript", $argSource, "source");
        return $this;
    }

    /**
     * Defines STYLE tag
     * 
     * Assigns STYLE tag into HEAD element content
     *
     * @access public
     * @param string $argType
     * @param string $argContent
     * @param array $argAttributes
     */
    public function style($argType, $argContent, $argAttributes = array())
    {
        $tagStyle = $this->__style();

        $tagStyle->attribute('type', $argType);
        $tagStyle->innerHTML("<!--\n".$argContent."\n-->");

        foreach ($argAttributes as $key => $value) {
            $tagStyle->attribute($key, $value);
        }

        $this->arrHeadStyle[] = $tagStyle->fetch();
        return $this;
    }

    /**
     * Defines css' style script
     * 
     * Inserting css' style script into STYLE element content
     *
     * @access public
     * @param string $argContent
     */
    public function css($argContent)
    {
        $this->style("text/css", $argContent);
        return $this;
    }

    /**
     * Fetchs HEAD element
     * 
     * Returns HEAD element and its contents
     *
     * @access public
     * @return string
     */
    public function fetch()
    {
        $this->process();

        return $this->documentHead;
    }

    /**
     * Displays HEAD element
     * 
     * Displays HEAD element and its contents
     *
     * @access public
     */
    public function display()
    {
        echo $this->fetch();
    }
}
?>
