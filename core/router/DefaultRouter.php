<?php namespace core\router;

use \core\engine\Request;
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
		
		$actionClass = "";
		$method      = "";
		
		return new Route($actionClass, $method);
	}
}