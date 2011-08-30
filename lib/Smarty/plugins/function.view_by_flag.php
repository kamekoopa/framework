<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {view_by_flag} function plugin
 *
 * Type:     function<br>
 * Name:     counter<br>
 * Purpose:  print out a counter value
 * @author Monte Ohrt <monte at ohrt dot com>
 * @link http://smarty.php.net/manual/en/language.function.counter.php {counter}
 *       (Smarty online manual)
 * @param array parameters
 * @param Smarty
 * @return string|null
 */
function smarty_function_view_by_flag($params, &$smarty)
{
	/**
	 *	��耗五�����ｦ������������
	 */
	//���
	if(!isset($params['value']))
	{
		return;
	}	
	//耗五��	
	if(!isset($params['flag']))
	{
		return;
	}	
	
	switch($params['flag'])
	{
		CASE 't':
			$flag = true;
			break;
		CASE 'f':
			$flag = false;
			break;
		default:
			$flag = $params['flag'];
			break;
	}
	
	if( $flag == true )
	{
		//�ｦ耗五:true
		return $params['value'];
	}else{
		//�ｦ耗五:false
		return (isset($params['default'])) ? $params['default']:false;
	}
}

/* vim: set expandtab: */

?>
