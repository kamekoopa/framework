<?php namespace core\filter;

use \core\engine\Request;

/**
 *
 * @author kamekoopa
 */
class OutputFilterChain {


	/**
	 * @access public
	 * @param \core\filter\IOutputFilter $outputFilter
	 */
	public function addFilter(IOutputFilter $outputFilter){
		return $this;
	}


	/**
	 * @access public
	 * @param string $output
	 */
	public function filter(Request $output){

	}
}