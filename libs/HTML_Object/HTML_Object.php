<?php
/**
 * This file contains the code for main HTML object class
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
 * @copyright   2010 bekasi-code.qummatic.com
 * @license     http://www.gnu.org/licenses/lgpl-3.0.txt LGPL Version 3
 * @version     ver 0.1
 * @link        http://bekasi-code.qummatic.com/html-object
 */

/**
 * HTML Object Main Class
 *
 * This class is main class for making HTML Object, and providing
 * frequently used tag of HTML.
 *
 * Frequently Used Tags include:
 * - span: HTML_Object::span(), Defines a section in a document
 * - div: HTML_Object::div(), Defines a section in a document
 * - page: HTML_Object::page(), Defines a paragraph
 * - bold: HTML_Object::bold(), Defines bold text
 * - strong: HTML_Object::strong(), Defines strong text
 * - italic: HTML_Object::italic(), Defines italic text
 * - underline: HTML_Object::italic(), Defines underlined text
 * - ruler: HTML_Object::ruler(), Defines a horizontal line
 * - bullet: HTML_Object::bullet(), Defines an unordered list (a bulleted list)
 * - numbering: HTML_Object::numbering(), Defines an ordered list (numerical / alphabetical list)
 * - script: HTML_Object::script(), Inserts client side script (JavaScript, VB Script, etc)
 * - style: HTML_Object::style(), Inserts style sheet code (CSS)
 * - newline: HTML_Object::newline(), Defines a single line break
 * - images: HTML_Object::images(), Defines an image
 * - link: HTML_Object::link(), Defines a link to another document, by using the href attribute.
 * - header: HTML_Object::header(), Defines HTML headings
 *
 * @access public
 * @version class-ver 0.1.1
 * @author Abdul Hanan (http://hanan.qummatic.com)
 */
class HTML_Object
{
    /**#@+*/
    /**
     * @var     object
     * @access  public
     */
    public $Tag;
    public $Document;
    public $Table;
    public $Form;
    /**#@-*/

    /**
     * Constructor of the container class
     *
     * Defines a few of objects that are required
     *
     * @access public
     */
    public function __construct()
    {
        $this->Document = new HO_Document;
        $this->Table = new HO_Table;
        $this->Form = new HO_Form;
    }

    /**
     * Overiding method
     *
     * The Overiding Method in main class is used to define HTML Tags, the method
     * returns HO_Tag object.
     *
     * Here's an example script:
     * <code>
     * $html = new HTML_Object();
     * $tagDiv = $html->__div('div-1');
     * $tagDiv->innerHTML("Example Script");
     * $tagDiv->display();
     * </code>
     *
     * Output:
     * <code>
     *   <div id="div-1">Example Script</div>
     * </code>
     *
     * @access public
     * @param string $argTag
     * @param array $argParams
     * @return object HO_Tag
     */
    public function __call($argTag, $argParams)
    {
        if (preg_match("/__/", $argTag, $matches)) {
            $tag = str_replace("__", "", $argTag);
            $attributes = array();
            $i = 0;
            foreach ($argParams as $value) {
                if ($value) {
                    if ($i == 0) {
                        if (!is_null($value) && trim($value))
                            $attributes['id'] = $value;
                    }
                    else {
                        foreach ($value as $subKey => $subValue) {
                            $attributes[$subKey] = $subValue;
                        }
                    }
                }
                $i++;
            }
            $this->Tag = new HO_Tag($tag, $attributes);

            return $this->Tag;
        }
    }

    /**
     * Defines a section in html document
     *
     * This method returns <span> tag, includes ID attribute and STYLE
     * attribute
     *
     * @access  public
     * @param string $argHTML
     * @param string $argID
     * @param string $argStyle
     * @param string $argClass
     * @param array $argAttributes
     * @return  string
     */
    public function span($argHTML, $argID = NULL, $argStyle = NULL, $argClass = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argStyle) && trim($argStyle))
            $attributes['style'] = $argStyle;
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}
        $tagSpan = $this->__span($argID, $atributes);
        $tagSpan->innerHTML($argHTML);

        return $tagSpan->fetch();
    }

    /**
     * Defines a division or a section in html document
     *
     * This method returns <div> tag, includes ID attribute, STYLE
     * attribute, CLASS attribute and custom defined attributes
     *
     * @access  public
     * @param string $argHTML
     * @param string $argID
     * @param string $argStyle
     * @param string $argClass
     * @param array $argAttributes
     * @return string
     */
    public function div($argHTML, $argID = NULL, $argStyle = NULL, $argClass = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argStyle) && trim($argStyle))
            $attributes['style'] = $argStyle;
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}
        $tagDiv = $this->__div($argID, $attributes);
        $tagDiv->innerHTML($argHTML);

        return $tagDiv->fetch();
    }

    /**
     * Defines a paragraph
     *
     * This method returns <<p>> tag, includes ID attribute STYLE
     * attribute, CLASS attribute and custom defined attributes
     *
     * @access public
     * @param string $argHTML
     * @param string $argID
     * @param string $argStyle
     * @param string $argClass
     * @param array $argAttributes
     * @return string
     */
    public function page($argHTML, $argID = NULL, $argStyle = NULL, $argClass = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argStyle) && trim($argStyle))
            $attributes['style'] = $argStyle;
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}
            
        $tagPage = $this->__p($argID, $attributes);
        $tagPage->innerHTML($argHTML);

        return $tagPage->fetch();
    }

    /**
     * Defines bold text
     *
     * This method returns <<b>> tag, includes ID attribute, CLASS
     * attribute and custom defined attributes
     *
     * @access public
     * @param string $argHTML
     * @param string $argID
     * @param string $argClass
     * @param array $argAttributes
     * @return string 
     */
    public function bold($argHTML, $argID = NULL, $argClass = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}    
        $tagBold = $this->__b($argID, $attributes);
        $tagBold->innerHTML($argHTML);

        return $tagBold->fetch();
    }

    /**
     * Defines strong text
     *
     * This method returns <strong> tag, includes ID attribute, CLASS
     * attribute and custom defined attributes
     * 
     * @access public
     * @param string $argHTML
     * @param string $argID
     * @param string $argClass
     * @param array $argAttributes
     * @return string
     */
    public function strong($argHTML, $argID = NULL, $argClass = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}
        $tagStrong = $this->__strong($argID, $attributes);
        $tagStrong->innerHTML($argHTML);

        return $tagStrong->fetch();
    }

    /**
     * Defines italic text
     *
     * This method returns <<i>> tag, includes ID attribute, CLASS
     * attribute and custom defined attributes
     *
     * @access public
     * @param string $argHTML
     * @param string $argID
     * @param string $argClass
     * @param array $argAttributes
     * @return string
     */
    public function italic($argHTML, $argID = NULL, $argClass = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}    
        $tagImage = $this->__i($argID, $attributes);
        $tagImage->innerHTML($argHTML);

        return $tagImage->fetch();
    }
    
    /**
     * Defines underlined text
     *
     * This method returns <span> tag with style that contains underlined text
     * (text-decoration:underline), includes ID attribute, CLASS attribute 
     * and custom defined attributes
     * 
     * @access public
     * @param string $argHTML
     * @param string $argID
     * @param string $argClass
     * @param array $argAttributes
     * @return string
     */
    public function underline($argHTML, $argID = NULL, $argClass = NULL, $argAttributes = array())
    {
        return $this->span($argHTML, $argID, "text-decoration: underline", $argClass, $argAttributes);
    }

    /**
     * Defines a horizontal line
     *
     * This method returns <hr /> tag, includes ID attribute
     *
     * @access public
     * @param string $argID
     * @return string
     */
    public function ruler($argID = NULL)
    {

        $tagRuler = $this->__hr($argID);

        return $tagRuler->fetch();
    }

    /**
     * Defines an unordered list (a bulleted list)
     *
     * This method returns <<ul>> tag, includes ID attribute, CLASS attribute, 
     * custom defined attributes and the lists (<<li>> tags) as its contents
     *
     * @access public
     * @param array $argLists
     * @param string $argID
     * @param string $argClass
     * @param array $argAttributes
     * @return string
     */
    public function bullet($argLists, $argID = NULL, $argClass = NULL, $argAttributes = array())
    {
        $list = '';
        foreach ($argLists as $value) {
            $listKey = NULL;
            $listAttributes = array();
            if (is_array($value)) {
                $listValue = $value[0];
                $listKey = (isset($value[1]) && $value[1]) ? $value[1] : NULL;
                $listAttributes = (isset($value[2]) && is_array($value[2])) ? $value[2] : NULL;

                $tagList = $this->__li($listKey, $listAttributes);
                $tagList->innerHTML($listValue);
                $list .= "\t".$tagList->fetch();
            }
            else {
                $tagList = $this->__li();
                $tagList->innerHTML($value);
                $list .= "\t".$tagList->fetch();
            }
        }
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}        
        $tagBullet = $this->__ul($argID, $attributes);
        $tagBullet->innerHTML($list);

        return $tagBullet->fetch();
    }

    /**
     * Defines an ordered list (numerical / alphabetical list)
     *
     * This method returns <<ol>> tag, includes ID Attribute, CLASS attribute, 
     * custom defined attributes and the lists (<<li>> tags) as its contents
     *
     * @access public
     * @param array $argLists
     * @param string $argID
     * @param string $argClass
     * @param array $argAttributes
     * @return string
     */
    public function numbering($argLists, $argID = NULL, $argClass = NULL, $argAttributes = array())
    {
        $list = '';
        foreach ($argLists as $value) {
            $listKey = NULL;
            $listAttributes = array();
            if (is_array($value)) {
                $listValue = $value[0];
                $listKey = (isset($value[1]) && $value[1]) ? $value[1] : NULL;
                $listAttributes = (isset($value[2]) && is_array($value[2])) ? $value[2] : NULL;

                $tagList = $this->__li($listKey, $listAttributes);
                $tagList->innerHTML($listValue);
                $list .= "\t".$tagList->fetch();
            }
            else {
                $tagList = $this->__li();
                $tagList->innerHTML($value);
                $list .= "\t".$tagList->fetch();
            }
        }
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}
        $tagNumbering = $this->__ol($argID, $attributes);
        $tagNumbering->innerHTML($list);

        return $tagNumbering->fetch();
    }

    /**
     * Inserts client side script (JavaScript, VB Script, etc)
     *
     * This method returns <script> tag, includes TYPE attribute,
     * custom defined attributes and client side scripts as the contents
     *
     * @access public
     * @param string $argScript
     * @param string $argType
     * @param string $argID
     * @param string $argAttributes
     * @return string
     */
    public function script($argScript, $argType = 'text/javascript', $argID = NULL, $argAttributes = array())
    {
        $tagScript = $this->__script($argID, $argAttributes);

        $tagScript->attribute('type', $argType);
        $tagScript->innerHTML("<!--\n".$argScript."\n-->");
        
        return $tagScript->fetch();
    }

    /** 
     * Inserts style sheet code (CSS)
     *
     * This method returns <style> tag, includes TYPE attribute,
     * custom defined attributes and style sheet code as the contents
     *
     * @access public
     * @param string $argStyle
     * @param string $argType
     * @param string $argID
     * @param array $argAttributes
     * @return string
     */
    public function style($argStyle, $argType = 'text/css', $argID = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        $attributes['type'] = $argType;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}
        $tagStyle = $this->__style($argID, $attributes);
        $tagStyle->innerHTML("<!--\n".$argStyle."\n-->");

        return $tagStyle->fetch();
    }

    /**
     * Defines a single line break
     *
     * This method returns <<br />> tag
     *
     * @access public
     * @return string
     */
    public function newline()
    {
        $tagNewLine = $this->__br();

        return $tagNewLine->fetch();
    }

    /**
     * Defines an image
     *
     * This method returns <img /> tag, includes IMG attribute (for defining
     * image source), ID attribute, CLASS attribute and custom defined attributes
     *
     * @access public
     * @param string $argImage
     * @param string $argID
     * @param string $argClass
     * @param array $argAttributes
     * @return string
     */
    public function image($argImage, $argID = NULL, $argClass = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        $attributes['src'] = $argImage;
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}        
        $tagImage = $this->__img($argID, $attributes);
        return $tagImage->fetch();
    }

    /**
     * Defines a link to another document, by using the HREF attribute
     *
     * This method returns <a> tag, includes HREF attribute (for defining
     * location document), ID attribute, CLASS attribute, and custom defined attributes
     *
     * @access public
     * @param string $argLabel
     * @param string $argLink
     * @param string $argID
     * @param string $argClass     
     * @param array $argAttributes
     * @return string
     */
    public function link($argLabel, $argLink = NULL, $argID = NULL, $argClass = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argLink) && trim($argLink))
            $attributes['href'] = $argLink;
        else
            $attributes['href'] = '#';
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}

        $tagLink = $this->__a($argID, $attributes);
        $tagLink->innerHTML($argLabel);

        return $tagLink->fetch();
    }

    /**
     * Defines HTML headings
     * 
     * This method returns <h1> - <h6> tags, include ID attribute and
     * STYLE attribute, CLASS attribute, and custom defined attributes
     *
     * @access public
     * @param string $argHTML
     * @param int $argLevel
     * @param string $argID
     * @param string $argStyle
     * @param string $argClass
     * @param array $argAttributes
     * @return  string
     */
    public function header($argHTML, $argLevel = 1, $argID = NULL, $argStyle = NULL, $argClass = NULL, $argAttributes = array())
    {
        // {{{ assigning variable $attributes
        $attributes = array();
        if (!is_null($argStyle) && trim($argStyle))
            $attributes['style'] = $argStyle;
        if (!is_null($argClass) && trim($argClass))
            $attributes['class'] = $argClass;
        if ($argAttributes && is_array($argAttributes))
            $attributes = array_merge($attributes, $argAttributes);
        // }}}
            
        switch ($argLevel) {
            case 1:
                $tagHeader = $this->__h1($argID, $attributes);
                break;
            case 2:
                $tagHeader = $this->__h2($argID, $attributes);
                break;
            default:
            case 3:
                $tagHeader = $this->__h3($argID, $attributes);
                break;
            case 4:
                $tagHeader = $this->__h4($argID, $attributes);
                break;
            case 5:
                $tagHeader = $this->__h5($argID, $attributes);
                break;
            case 6:
                $tagHeader = $this->__h6($argID, $attributes);
                break;
        }
        
        $tagHeader->innerHTML($argHTML);

        return $tagHeader->fetch();
    }

    /**
     * Defines HTML Comment
     *
     * This method returns <!-- --> comment tag
     *
     * @access public
     * @param string $argValue
     * @return string
     */
    public function comment($argValue)
    {
        return "<!--".$argValue."-->";
    }
}
?>