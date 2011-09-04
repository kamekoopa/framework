<?php namespace core;

use core\Configuration;

use core\dispatcher\Dispatcher;

use core\engine\ApacheEngine;

use core\router\DefaultRouter;


/**
 * フレームワーク
 *
 * @author kamekoopa
 */
class Framework {

	/**
	 * @access private
	 * @static
	 * @var \core\Framework このクラスのインスタンス
	 */
	private static $me;

	/**
	 * @access private
	 * @var \core\Configuration 設定クラスのインスタンス
	 */
	private $config;


	/**
	 * コンストラクタ
	 * @access private
	 *
	 * @param string $controllerDir コントローラークラスのディレクトリ
	 * @param string $viewDir テンプレートが存在するディレクトリ
	 */
	private function __construct($controllerDir, $viewDir){

		$this->config = Configuration::getInstance($controllerDir, $viewDir)
			->setEngine(new ApacheEngine())
			->setRouter(new DefaultRouter())
		;
	}


	/**
	 * このクラスの唯一のインスタンスを取得します
	 * @access public
	 * @static
	 *
	 * @param string $controllerDir コントローラークラスのディレクトリ
	 * @param string $viewDir テンプレートが存在するディレクトリ
	 *
	 * @return core\Framework このクラスの唯一のインスタンス
	 */
	public static function getInstance($controllerDir, $viewDir){

		if(self::$me == null){
			self::$me = new self($controllerDir, $viewDir);
		}

		return self::$me;
	}


	/**
	 * 設定を取得します。
	 * @access public
	 *
	 * @return core\Configuration このフレームワークの設定
	 */
	public function getConfiguration(){

		return $this->config;
	}


	/**
	 * 現在の設定でフレームワークを起動します
	 *
	 * @access public
	 */
	public function fire(){

		$config = $this->getConfiguration();

		//設定されているエンジンからリクエストオブジェクトを取得
		$request = $config->getEngine()->getRequest();

		//設定されているRouterを使って、リクエストオブジェクトからルーティング情報を取得
		$route = $config->getRouter()->getRoute($request);

		//ルーティング情報に従ってアクションクラスを処理
		$dispatcher = new Dispatcher($config, $route, $request);
		$response = $dispatcher->dispatch();

		//設定されているエンジンを利用してレスポンスを送出
		$config->getEngine()->sendResponse($response);
	}
}