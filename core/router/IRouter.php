<?php namespace core\router;

use \core\engine\Request;

/**
 * ルータインタフェース
 * @author kamekoopa
 */
interface IRouter{

	/**
	 * リクエスト情報からルーティングオブジェクトを生成します
	 * @access public
	 * 
	 * @param \core\engine\Request $request リクエストオブジェクト
	 * 
	 * @return \core\router\Route ルーティング情報オブジェクト
	 */
	public function getRoute(Request $request);
}