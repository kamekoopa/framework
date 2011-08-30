<?php namespace framework\core\dispatcher;

use framework\core\core_Configure;

use framework\core\engine\core_engine_Response;
use framework\core\engine\core_engine_Request;
use framework\core\router\core_router_Route;

/**
 * アクションディスパッチャ
 * @author kamekoopa
 */
class core_dispatcher_Dispatcher {

	/**
	 * @var framework\core\core_Configure 設定オブジェクト
	 */
	private $config;
	
	/**
	 * @var framework\core\router\core_router_Route ルーティング情報オブジェクト
	 */
	private $route;
	
	/**
	 * @var framework\core\engine\core_engine_Request リクエストオブジェクト
	 */
	private $request;
	
	/**
	 * コンストラクタ
	 * @access public
	 * 
	 * @param framework\core\core_Configure 設定オブジェクト
	 * @param framework\core\router\core_router_Route ルーティング情報オブジェクト
	 * @param framework\core\engine\core_engine_Request リクエストオブジェクト
	 */
	public function __construct(core_Configure $config, core_router_Route $route, core_engine_Request $request){
		
		$this->config = $config;
		$this->route = $route;
		$this->request = $request;
	}
	
	
	/**
	 * 設定されている情報をもとにアクションクラスへ処理をディスパッチします。
	 * 
	 * @access public
	 * 
	 * @return framework\core\engine\core_engine_Response レスポンスオブジェクト
	 */
	public function dispatch(){
		
		return new core_engine_Response();
	}
}
