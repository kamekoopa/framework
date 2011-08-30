<?php namespace framework\core\router;

use framework\core\engine\core_engine_Request;

/**
 * ルータインタフェース
 * @author kamekoopa
 */
interface core_router_IRouter{

	/**
	 * リクエスト情報からルーティングオブジェクトを生成します
	 * @access public
	 * 
	 * @param framework\core\engine\core_engine_Request $request リクエストオブジェクト
	 * 
	 * @return framework\core\router\core_router_Route ルーティング情報オブジェクト
	 */
	public function getRoute(core_engine_Request $request);
}