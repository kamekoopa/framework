<?php namespace core\filter;

use \core\engine\Request;

/**
 *
 * @author kamekoopa
 */
class InputFilterChain {


	/**
	 * @access public
	 * @param \core\filter\IInputFilter $inputFilter
	 */
	public function addFilter(IInputFilter $inputFilter){
		return $this;
	}


	/**
	 * @access public
	 * @param \core\engine\Request $request
	 */
	public function filter(Request $request){

	}
}