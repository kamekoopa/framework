<?php namespace core\router;

use \core\engine\Request;

/**
 * リクエスト情報を解析し、ルーティングオブジェクトを生成する
 * ルータオブジェクトが実装すべきインタフェースです。
 *
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