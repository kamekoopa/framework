<?php namespace core\router;

use \core\engine\Request;
use \core\exception\FrameworkException;
use \core\router\IRouter;

/**
 * デフォルトルータ
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