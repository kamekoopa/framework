<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty simple_xml_from_arr function plugin
 *
 * Type:     function<br>
 * Name:     cat<br>
 * Date:     Feb 24, 2003
 * Purpose:  catenate a value to a variable
 * Input:    string to catenate
 * Example:  {simple_xml_from_arr arr=$array}
 * @link http://smarty.php.net/manual/en/language.modifier.cat.php cat
 *          (Smarty online manual)
 * @author   Daisuke Suzuki
 * @version 1.0
 * @param string
 * @param string
 * @return string
 */
function smarty_function_simple_xml_from_arr($params, & $smarty)
{
	if(!isset($params['arr']) OR !is_array($params['arr']) OR count($params['arr']) == 0 )
	{
		return ;
	}

	$simpleXml = makeSimpleXmlNode( $params['arr'] );
	
	//��r����
	if(isset($params['var']))
	{
		$smarty->assign($params['var'], $simpleXml);
	}else{
		return $simpleXml;
	}
}

/* vim: set expandtab: */
function makeSimpleXmlNode( $array )
{
	foreach( $array as $key => $value )
	{
		if(is_string($key) && is_array($value) && count($value) > 0)
		{
			$node .= sprintf('<%1$s>%2$s</%1$s>',str_replace(':','_',$key),makeSimpleXmlNode($value));
		}elseif(is_string($key) && is_string($value) ){	
			$node .= sprintf('<%1$s>%2$s</%1$s>',str_replace(':','_',$key),$value);
		}else{
			$node .= makeSimpleXmlNode($value);
		}
	}
	return $node;
}
?>
