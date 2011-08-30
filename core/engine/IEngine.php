<?php namespace framework\core\engine;

/**
 * 
 * @author kamekoopa
 */
interface core_engine_IEngine {

	/**
	 * リクエストオブジェクトを生成します。
	 * 
	 * @access public
	 * 
	 * @return
	 */
	public function getRequest();
	
	
	/**
	 * レスポンスを送信します。
	 * 
	 * @access public 
	 */
	public function sendResponse();
}