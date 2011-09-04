<?php namespace core;

use core\router\IRouter;

use core\engine\IEngine;


/**
 * 設定クラス
 *
 * @author kamekoopa
 */
class Configuration {

	/**
	 * @access private
	 * @static
	 * @var \core\Configuration このクラスの唯一のインスタンス
	 */
	private static $me = null;

	/**
	 * @access private
	 * @var string コントローラークラスの存在するディレクトリ
	 */
	private $controllerDir;


	/**
	 * @access private
	 * @var string ビューテンプレートが存在するディレクトリ
	 */
	private $viewDir;

	/**
	 * @access private
	 * @var \core\engine\IEngine 使用するエンジンクラス
	 */
	private $engine;

	/**
	 * @access private
	 * @var \core\router\IRouter 使用するルータクラス
	 */
	private $router;


	/**
	 * コンストラクタ(非公開)
	 * @access private
	 *
 	 * @param string $controllerDir コントローラークラスのディレクトリ
	 * @param string $viewDir テンプレートが存在するディレクトリ
	 */
	private function __construct($controllerDir, $viewDir){

		$this->controllerDir = $controllerDir;
		$this->viewDir = $viewDir;
	}


	/**
	 * 設定クラスの唯一のインスタンスを取得します
	 *
	 * @access public
	 * @static
	 *
	 * @return \core\Configuration このクラスのインスタンス
	 */
	public static function getInstance($controllerDir, $viewDir){

		if(self::$me == null){
			self::$me = new self($controllerDir, $viewDir);
		}

		return self::$me;
	}


	/**
	 * アプリのコントローラークラスの存在するディレクトリを返します。
	 * @access public
	 *
	 * @return string コントローラークラスの存在するディレクトリ
	 */
	public function getControllerDir(){
		return $this->controllerDir;
	}

	/**
	 * アプリのビューテンプレートが存在するディレクトリを返します。
	 * @access public
	 *
	 * @return string ビューテンプレートの存在するディレクトリ
	 */
	public function getViewDir(){
		return $this->viewDir;
	}


	/**
	 * 設定されているエンジンクラスを返します
	 *
	 * @access public
	 *
	 * @return \core\engine\IEngine 設定されているエンジンクラス
	 */
	public function getEngine(){
		return $this->engine;
	}


	/**
	 * このフレームワークで使用するエンジンクラスを設定します。
	 *
	 * @access public
	 *
	 * @param \core\engine\IEngine 使用するエンジンクラス
	 *
	 * @return \core\Configuration このクラスのインスタンス
	 */
	public function setEngine(IEngine $engine){

		$this->engine = $engine;

		return $this;
	}


	/**
	 * このフレームワークで使用するルータを取得します。
	 *
	 * @access public
	 *
	 * @return \core\router\IRouter ルータオブジェクト
	 */
	public function getRouter(){
		return $this->router;
	}


	/**
	 * このフレームワークで使用するルータを設定します。
	 * @access public
	 *
	 * @param \core\router\IRouter ルータオブジェクト
	 *
	 * @return \core\Configuration このクラスのインスタンス
	 */
	public function setRouter(IRouter $router){

		$this->router = $router;

		return $this;
	}


	public function getLogger(){
	}


	public function setLogger(){

		return $this;
	}
}