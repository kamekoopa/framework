<?php namespace core;

use core\Configuration;
use core\dispatcher\Dispatcher;
use core\engine\ApacheEngine;
use core\generator\SmartyGenerator;
use core\router\DefaultRouter;


/**
 * フレームワークの始点となるクラスです。
 * アプリケーションのエントリーポイントで、このクラスにアプリのルートディレクトリを与えて構築し
 * fire()メソッドを実行することでこのフレームワークを起動することが出来ます。
 *
 * このフレームワークは大きく
 * ・サーバとのドライバとなるエンジンクラス
 * ・リクエスト情報を元に実行するアクションクラスとメソッドを決定するルーティングクラス
 * ・テンプレートエンジンとのアダプタとなるジェネレータクラス
 * から構成されており
 * これらはフレームワークが持つインタフェース、または抽象クラスの実装クラスを用意することで
 * 変更することが出来ます。
 * 特に設定しない場合はフレームワークが用意したデフォルトのものが利用されます。
 *
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
	 * @param string $appRootDir ウェブアプリのルートディレクトリ
	 */
	private function __construct($appRootDir){

		$this->config = Configuration::getInstance($appRootDir);
		$this->config
			->setEngine(new ApacheEngine())
			->setRouter(new DefaultRouter())
			->setGenerator(new SmartyGenerator($this->config))
		;
	}


	/**
	 * このクラスの唯一のインスタンスを取得します
	 * @access public
	 * @static
	 *
	 * @param string $appRootDir ウェブアプリのルートディレクトリ
	 *
	 * @return core\Framework このクラスの唯一のインスタンス
	 */
	public static function getInstance($appRootDir){

		if(self::$me == null){
			self::$me = new self($appRootDir);
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
	 *
	 * @return void
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