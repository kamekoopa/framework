<?php namespace core\engine;

/**
 *
 * @author kamekoopa
 */
interface IEngine {

	/**
	 * リクエストオブジェクトを生成します。
	 *
	 * @access public
	 *
	 * @return \core\engine\Request リクエストオブジェクト
	 */
	public function getRequest();


	/**
	 * レスポンスを送信します。
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function sendResponse();
}