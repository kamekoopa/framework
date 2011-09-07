<?php namespace core\router;

use \core\engine\Request;
use \core\exception\FrameworkException;
use \core\router\IRouter;

/**
 * フレームワークがデフォルトで利用するルータです。
 * クエリパラメータにc=user&m=listで指定された場合
 * \controllers\UserController::list()メソッドが実行されるように設定された
 * ルーティング情報オブジェクトを返します。
 *
 * @author kamekoopa
 */
class DefaultRouter implements IRouter{

	/**
	 * (non-PHPdoc)
	 * @see core/router/core\router.IRouter::getRoute()
	 */
	public function getRoute(Request $request){

		$param = $request->getQueryArray();

		if( empty($param["c"]) || empty($param["m"]) ){
			throw new FrameworkException(404, "parameter is not enough for routing.");
		}

		$actionClass = "\\controllers\\" . ucfirst($param["c"]) . "Controller";
		$method      = $param["m"];

		return new Route($actionClass, $method);
	}
}