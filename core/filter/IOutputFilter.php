<?php namespace core\filter;

/**
 *
 * @author kamekoopa
 */
interface IOutputFilter {

	/**
	 * @access public
	 * @param string $output
	 *
	 * @return string
	 */
	public function filterOutput($output);
}