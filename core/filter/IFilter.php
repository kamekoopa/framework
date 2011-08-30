<?php namespace framework\core\filter;

/**
 * Enter description here ...
 * @author kamekoopa
 */
interface core_filter_IFilter{

	public function preFilter();
	
	public function postFilter();
}
