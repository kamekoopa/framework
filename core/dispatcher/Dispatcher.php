<?php namespace core\dispatcher;

use \core\Configuration;

use \core\engine\Response;
use \core\engine\Request;

use \core\router\Route;


/**
 * アクションディスパッチャ
 * @author kamekoopa
 */
class Dispatcher {

	/**
	 * @access private
	 * @var \core\Configuration 設定オブジェクト
	 */
	private $config;

	/**
	 * @access private
	 * @var \core\router\Route ルーティング情報オブジェクト
	 */
	private $route;

	/**
	 * @access private
	 * @var \core\engine\Request リクエストオブジェクト
	 */
	private $request;


	/**
	 * コンストラクタ
	 * @access public
	 *
	 * @param \core\Configuration 設定オブジェクト
	 * @param \core\router\Route ルーティング情報オブジェクト
	 * @param \core\engine\Request リクエストオブジェクト
	 */
	public function __construct(Configuration $config, Route $route, Request $request){

		$this->config  = $config;
		$this->route   = $route;
		$this->request = $request;
	}


	/**
	 * 設定されている情報をもとにアクションクラスへ処理をディスパッチします。
	 *
	 * @access public
	 *
	 * @return \core\engine\Response レスポンスオブジェクト
	 */
	public function dispatch(){
		
		$nextRoute = $this->route;

		do {

			$actionClassName = $route->getActionClassName();
			$methodName      = $route->getMethodName();

			$controller = new $actionClassName($this->request, $this->config->getGenerator());
			$nextRoute = $controller->{$methodName}($this->request);

		}while($nextRoute != null);


		return $this->config->getGenerator()->generate(200);
	}
}
