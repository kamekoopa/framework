<?php namespace core\engine;


/**
 * サーバとのドライバとなるエンジンクラスが実装スべきインタフェースです
 *
 * @author kamekoopa
 */
interface IEngine {

	/**
	 * サーバプログラムとのAPIを利用してリクエストオブジェクトを生成します。
	 *
	 * @access public
	 *
	 * @return \core\engine\Request リクエストオブジェクト
	 */
	public function getRequest();


	/**
	 * サーバプログラムとのAPIを利用してレスポンスを送信します。
	 *
	 * @access public
	 *
	 * @param \core\engine\Response レスポンスオブジェクト
	 *
	 * @return void
	 */
	public function sendResponse(Response $response);
}