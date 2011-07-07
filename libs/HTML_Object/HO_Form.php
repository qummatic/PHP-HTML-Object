<?php
/**
 * This file contains the code for creating HTML Form Object
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
 *
 */

/**
 * HTML Form Object Class
 *
 * @subpackage HTML Table
 * @access private
 * @version class-ver 0.1.1
 * @author Abdul Hanan (http://hanan.qummatic.com)
 */
class HO_Form extends HTML_Object
{
    /**
     * @var     string
     * @access  public
     */
	public $stripslashes = NULL;
	
    /**
     * Constructor of the container class
     *
     * @access public
     */
    public function __construct()
    {
        if (is_null($this->stripslashes) && get_magic_quotes_gpc())
            $this->stripslashes = true;
	}	
	
    /**
     * Defines a form in html document
     *
     * @access public
     * @param string $argContent
     * @param string $argID
     * @param string $argName
     * @param string $argAction
     * @param string $argMethod
     * @param array $argAttributes
     * @return string
     */
    public function form($argContent, $argID = 'webform', $argName = 'webform', $argAction = NULL, $argMethod = NULL, $argAttributes = array())
    {
        // {{{ assigning attributes variable
        $attributes = array('class'=>'appsform');
        if ($argAttributes)
            $attributes = $argAttributes;
        // }}}
        // {{{ assign method & action
        if (!is_null($argAction) && trim($argAction))
            $attributes = array_merge($attributes, array('action'=>$argAction));
        if (!is_null($argMethod) && trim($argMethod))
            $attributes = array_merge($attributes, array('method'=>$argMethod));
        // }}}

        $form = $this->__form($argID, $attributes);
        if (!is_null($argName) && trim($argName))
            $form->name($argName);
        $form->innerHTML($argContent);
        // $form-

        return $form->fetch();
    }

    /**
     * Defines input form in html document
     *
     * @access public
     * @param string $argID
     * @param string $argType
     * @param string $argValue
     * @param string $argName
     * @param array $argAttributes
     * @param boolean $isHTMLSpecialChars
     * @return string
     */
    public function input($argID, $argType = 'text', $argValue = NULL, $argName = NULL, $argAttributes = array(), $isHTMLSpecialChars = true)
    {
        $arrAttributes = $argAttributes;
        $arrAttributes['type'] = $argType ;

        if (!is_null($argValue) && trim($argValue)) {
            if ($this->stripslashes)
                $argValue = stripslashes($argValue);
            $arrAttributes['value'] = ($isHTMLSpecialChars) ? htmlspecialchars($argValue, ENT_QUOTES) : $argValue;
        }
        $input = $this->__input($argID, $arrAttributes);
        if (!is_null($argName) && trim($argName))
            $input->name($argName);

        return $input->fetch();
    }

    /**
     * Defines textarea form in html document
     *
     * @access public
     * @param string $argID
     * @param string $argValue
     * @param string $argName
     * @param array $argAttributes
     * @param boolean $isHTMLSpecialChars
     * @return string
     */
    public function textarea($argID, $argValue = '', $argName = NULL, $argAttributes = array(), $isHTMLSpecialChars = true)
    {
        $arrAttributes = $argAttributes;
        $textarea = $this->__textarea($argID, $arrAttributes);
        if (!is_null($argName) && trim($argName))
            $textarea->name($argName);
        if ($this->stripslashes)
            $argValue = stripslashes($argValue);
        $textarea->innerHTML(($isHTMLSpecialChars) ? htmlspecialchars($argValue, ENT_QUOTES) : $argValue);
     
        return $textarea->fetch();
    }

    /**
     * Defines select form in html document
     *
     * @access public
     * @param string $argID
     * @param array $argValues
     * @param string $argName
     * @param array $argAttributes
     * @param boolean $isHTMLSpecialChars
     * @return string
     */
    public function select($argID, $argValues = array(), $argName = NULL, $argAttributes = array(), $isHTMLSpecialChars = true)
    {
        $arrAttributes = $argAttributes;
        $select = $this->__select($argID, $arrAttributes);
        if (!is_null($argName) && trim($argName))
            $select->name($argName);
        $optionContent = '';
        if ($argValues) {
            foreach ($argValues as $key=>$value) {
                $option = $this->__option();
                if ($this->stripslashes)
                    $key = stripslashes($key);
                $option->attribute('value', $key);
                $selected = 0;
                if (is_array($value)) {
                    $selected = $value[1];
                    $value = $value[0];
                }
                if ($selected) {
                   $option->attribute('selected', 'selected');
                }
                $option->innerHTML(($isHTMLSpecialChars) ? htmlspecialchars($value, ENT_QUOTES) : $value);
                $optionContent .= $option->fetch();
            }

            $select->innerHTML($optionContent);
        }

        return $select->fetch();
    }
}
?>
