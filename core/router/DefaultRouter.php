<?php namespace framework\core\router;

use framework\core\engine\core_engine_Request;
use framework\core\router\core_router_IRouter;

/**
 * デフォルトルータ
 * @author kamekoopa
 */
class core_router_DefaultRouter implements core_router_IRouter{

	/**
	 * (non-PHPdoc)
	 * @see core/router/framework\core\router.core_router_IRouter::getRoute()
	 */
	public function getRoute(core_engine_Request $request){
		
		$actionClass = "";
		$method      = "";
		
		return new core_router_Route($actionClass, $method);
	}
}