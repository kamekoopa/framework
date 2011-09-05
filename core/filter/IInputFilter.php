<?php namespace core\filter;

use \core\engine\Request;

/**
 *
 * @author kamekoopa
 */
interface IInputFilter {


	/**
	 * @access public
	 * @param \core\engine\Request $request
	 *
	 * @return \core\engine\Request
	 */
	public function filterInput(Request $request);
}