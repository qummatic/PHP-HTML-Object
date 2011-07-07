<?php
/**
 * This file contains the code for creating HTML Tag, The Attributes, and
 * The HTML Tag contents
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
 * @version     ver 0.2-dev
 * @link        http://bekasi-code.qummatic.com/html-object
 * 
 */

/**
 * HTML Object Tag Class
 *
 * Defines HTML Tags, The Attributes, The HTML Tag contents, and frequently used
 * Attributes
 *
 * frequently used Attributes include:
 * - name: HO_Tag::name(), Specifies a name for an element
 * - class: HO_Tag::setClass(), Specifies a classname for an element
 * - style: HO_Tag::style(), Specifies an inline style for an element
 * - title: HO_Tag::style(), Specifies extra information about an element
 * - onblur: HO_Tag::onblur(), Script to be run when an element loses focus on form events
 * - onchange: HO_Tag::onchange(), Script to be run when an element change on form events
 * - onfocus: HO_Tag::onfocus(), Script to be run when an element gets focus on form events
 * - onreset: HO_Tag::onreset(), Script to be run when a form is reset on form events
 * - onselect: HO_Tag::onselect(), Script to be run when an element is selected on form events
 * - onsubmit: HO_Tag::onsubmit(), Script to be run when a form is submitted on form events
 * - onkeydown: HO_Tag::onkeydown(), Script to be run when a key is pressed on keyboard events
 * - onkeypress: HO_Tag::onkeypress(), Script to be run when a key is pressed and released on keyboard events
 * - onkeyup: HO_Tag::onkeyup(), Script to be run when a key is released on keyboard events
 * - onclick: HO_Tag::onclick(), 	Script to be run on a mouse click on mouse events
 * - ondblclick: HO_Tag::ondblclick(), 	Script to be run on a mouse double-click on mouse events
 * - onmousedown: HO_Tag::onmousedown(), Script to be run when mouse button is pressed on mouse events
 * - onmousemove: HO_Tag::onmousemove(), Script to be run when mouse pointer moves on mouse events
 * - onmouseout: HO_Tag::onmouseout(), Script to be run when mouse pointer moves out of an element on mouse events
 * - onmouseover: HO_Tag::onmouseover(),Script to be run when mouse pointer moves over an element  on mouse events
 * - onmouseup: HO_Tag::onmouseup(), Script to be run when mouse button is released on mouse events
 * 
 * @access private
 * @version class-ver 0.2-dev
 * @author Abdul Hanan (http://hanan.qummatic.com)
 */
class HO_Tag extends HTML_Object
{
    /**#@+*/
    /**
     * @var string
     * @access private
     */
    private $tag;
    private $innerHTML;
    private $HTMLTag;
    /**#@-*/

    /**
     * @var array
     * @access private
     */
    private $arrAttributes = array();

    /**
     * @var bool
     * @access private
     */
    private $isInnerHTML = false;

    /**
     * Constructor of the container class
     *
     * Defines a few of the needed object
     *
     * @access  public
     * @param   string $argTag
     * @param   array $argAttributes
     */
    public function __construct($argTag, $argAttributes)
    {
        $this->tag = $argTag;
        $this->arrAttributes = $argAttributes;
    }

    /**
     * Generates attributes
     *
     * Scripts for generating attribute automatically
     *
     * @access  private
     * @return  string
     */
    private function generateAttribute()
    {
        $varReturn = "";
        if($this->arrAttributes && is_array($this->arrAttributes)) {
            $arrAttibuteImplode = array();
            foreach($this->arrAttributes as $key => $value) {
				$value = strval($value);
                $arrAttibuteImplode[] =  (!is_null($value) && ($value == '0' || trim($value))) ? "$key=\"$value\"" : $key;
            }
            $varReturn = implode(" ", $arrAttibuteImplode);
        }

        return $varReturn;
    }

    /**
     * Processes HTML Tag
     *
     * Scripts for precessing HTML tag, the attributes, and the HTML contents if exists
     *
     * @access  private
     */
    private function process()
    {
        if ($this->isInnerHTML) {
            if ($this->generateAttribute())
                $this->HTMLTag = "\n<".$this->tag." ".$this->generateAttribute().">";
            else
                $this->HTMLTag = "\n<".$this->tag.">";
            
            $this->HTMLTag .= $this->innerHTML;
            $this->HTMLTag .= "</".$this->tag.">";
        }
        else {
            if ($this->generateAttribute())
                $this->HTMLTag = "\n<".$this->tag." ".$this->generateAttribute()." />";
            else
                $this->HTMLTag = "\n<".$this->tag." />";
        }
    }

    /**
     * Defines tag's attribute
     *
     * Defines tag's attribute with assigning array of arrAttributes variable
     *
     * @access public
     * @param string $argName
     * @param string $argValue
     */
    public function attribute($argName, $argValue = NULL)
    {
        $this->arrAttributes[$argName] = $argValue;
        return $this;
    }

    /**
     * Defines HTML contents
     * 
     * @access  public
     * @param string $argHTML
     */
    public function innerHTML($argHTML)
    {
        $this->isInnerHTML = true;
        $this->innerHTML = $argHTML;
        return $this;
    }

    /**
     * Assigns NAME attribute
     *
     * Specifies a name for an element
     *
     * @access public
     * @param string $argValue
     */
    public function name($argValue)
    {
        $this->arrAttributes['name'] = $argValue;
        return $this;
    }

    /**
     * Assigns TITLE attribute
     *
     * Specifies extra information about an element
     *
     * @access public
     * @param string $argValue
     */
    public function title($argValue)
    {
        $this->arrAttributes['title'] = $argValue;
        return $this;
    }

    /** 
     * Assigns CLASS attribute
     *
     * Specifies a classname for an element
     *
     * @access public
     * @param string $argValue
     */
    public function setClass($argValue)
    {
        $this->arrAttributes['class'] = $argValue;
        return $this;
    }

    /**
     * Assigns STYLE attribute
     *
     * Specifies an inline style for an element
     *
     * @access public
     * @param string $argValue
     */
    public function style($argValue)
    {
        $this->arrAttributes['style'] = $argValue;
        return $this;
    }

    /**
     * Assign ONBLUR attribute
     *
     * Script to be run when an element loses focus on form events
     *
     * @access public
     * @param string $argScript
     *
     */
    public function onblur($argScript)
    {
        $this->arrAttributes['onblur'] = $argScript;
    }

    /**
     * Assigns ONCHANGE attribute
     *
     * Script to be run when an element change on form events
     *
     * @access public
     * @param string $argScript
     *
     */
    public function onchange($argScript)
    {
        $this->arrAttributes['onchange'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONFOCUS attribute
     *
     * Script to be run when an element gets focus on form events
     *
     * @access public
     * @param string $argScript
     *
     */
    public function onfocus($argScript)
    {
        $this->arrAttributes['onfocus'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONRESET attribute
     *
     * Script to be run when a form is reset on form events
     *
     * @access public
     * @param string $argScript
     *
     */
    public function onreset($argScript)
    {
        $this->arrAttributes['onreset'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONSELECT attribute
     *
     * Script to be run when an element is selected on form events
     *
     * @access public
     * @param string $argScript
     *
     */
    public function onselect($argScript)
    {
        $this->arrAttributes['onselect'] = $argScript;
    }

    /**
     * Assigns ONSUBMIT attribute
     *
     * Script to be run when a form is submitted on form events
     *
     * @access public
     * @param string $argScript
     *
     */
    public function onsubmit($argScript)
    {
        $this->arrAttributes['onsubmit'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONKEYDOWN attribute
     *
     * Script to be run when a key is pressed on keyboard events
     *
     * @access public
     * @param string $argScript
     */
    public function onkeydown($argScript)
    {
        $this->arrAttributes['onkeydown'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONKEYPRESS attribute
     *
     * Script to be run when a key is pressed and released on keyboard events
     *
     * @access public
     * @param string $argScript
     */
    public function onkeypress($argScript)
    {
        $this->arrAttributes['onkeypress'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONKEYUP attribute
     *
     * Script to be run when a key is released on keyboard events
     *
     * @access public
     * @param string $argScript
     */
    public function onkeyup($argScript)
    {
        $this->arrAttributes['onkeyup'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONCLICK attribute
     *
     * Script to be run on a mouse click on mouse events
     *
     * @access public
     * @param string $argScript
     */
    public function onclick($argScript)
    {
        $this->arrAttributes['onclick'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONDBLCLICK attribute
     *
     * Script to be run on a mouse double-click on mouse events
     *
     * @access public
     * @param string $argScript
     */
    public function ondblclick($argScript)
    {
        $this->arrAttributes['ondblclick'] = $argScript;
    }

    /**
     * Assigns ONMOUSEDOWN attribute
     *
     * Script to be run when mouse button is pressed on mouse events
     *
     * @access public
     * @param string $argScript
     */
    public function onmousedown($argScript)
    {
        $this->arrAttributes['onmousedown'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONMOUSEMOVE attribute
     *
     * Script to be run when mouse pointer moves on mouse events
     *
     * @access public
     * @param string $argScript
     */
    public function onmousemove($argScript)
    {
        $this->arrAttributes['onmousemove'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONMOUSEOUT attribute
     *
     * Script to be run when mouse pointer moves out of an element on mouse events
     *
     * @access public
     * @param string $argScript
     */
    public function onmouseout($argScript)
    {
        $this->arrAttributes['onmouseout'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONMOUSEOVER attribute
     *
     * Script to be run when mouse pointer moves over an element on mouse events
     *
     * @access public
     * @param string $argScript
     */
    public function onmouseover($argScript)
    {
        $this->arrAttributes['onmouseover'] = $argScript;
        return $this;
    }

    /**
     * Assigns ONMOUSEUP attribute
     *
     * Script to be run when mouse button is released on mouse events
     *
     * @access public
     * @param string $argScript
     */
    public function onmouseup($argScript)
    {
        $this->arrAttributes['onmouseup'] = $argScript;
        return $this;
    }

    /**
     * Fetches HTML Tag
     *
     * Returns HTML Tag, the attributes, and the HTML contents if exists
     *
     * @access  public
     * @return  string
     */
    public function fetch()
    {
        $this->process();
        return $this->HTMLTag;
    }

    /**
     * Displays HTML Tag
     * 
     * Displays HTML Tag, the attributes, and the HTML contents if exists
     *
     * @access  public
     */
    public function display()
    {
        echo $this->fetch();
    }
}
?>
