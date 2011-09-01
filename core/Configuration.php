<?php namespace framework\core;

use framework\core\router\core_router_IRouter;

use framework\core\engine\core_engine_IEngine;

/**
 * 設定クラス
 * 
 * @author kamekoopa
 */
class core_Configuration {

	/**
	 * @var framework\core\core_Configuration このクラスの唯一のインスタンス
	 */
	private static $me = null;
	
	/**
	 * @var string コントローラークラスの存在するディレクトリ
	 */
	private $controllerDir;
	
	/**
	 * @var string ビューテンプレートが存在するディレクトリ
	 */
	private $viewDir;
	
	/**
	 * @var framework\core\engine\core_engine_IEngine 使用するエンジンクラス 
	 */
	private $engine;
	
	/**
	 * @var framework\core\router\core_router_IRouter 使用するルータオブジェクト
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
	 * @return framework\core\core_Configuration このクラスのインスタンス
	 */
	public static function getInstance($controllerDir, $viewDir){

		if(self::$me == null){
			self::$me = new self($controllerDir, $viewDir);
		}
		
		return self::$me;
	}
	
	
	/**
	 * フレームワークが設置されている場所をフルパスで返します。
	 * 
	 * @return string フレームワークの設置されているディレクトリパス
	 */
	public function getFwRootDir(){
		return "";
	}

	/**
	 * アプリのコントローラークラスの存在するディレクトリを返します。
	 * @access public
	 * 
	 * @return string コントローラークラスの存在するディレクトリ
	 */
	public function getControllerDir(){
	}
	
	/**
	 * アプリのビューテンプレートが存在するディレクトリを返します。
	 * @access public
	 * 
	 * @return string ビューテンプレートの存在するディレクトリ
	 */
	public function getViewDir(){
	}
	
	/**
	 * 設定されているエンジンクラスを返します
	 * 
	 * @access public
	 * 
	 * @return framework\core\engine\core_engine_IEngine 設定されているエンジンクラス
	 */
	public function getEngine(){
	}
	
	/**
	 * このフレームワークで使用するエンジンクラスを設定します。
	 * 
	 * @access public
	 * 
	 * @param framework\core\engine\core_engine_IEngine $engine
	 * 
	 * @return framework\core\core_Configuration このクラスのインスタンス
	 */
	public function setEngine(core_engine_IEngine $engine){
		
		$this->engine = $engine;
		
		return $this;
	}
	
	
	/**
	 * このフレームワークで使用するルータを取得します。
	 * 
	 * @access public
	 * 
	 * @return framework\core\router\core_router_IRouter ルータオブジェクト
	 */
	public function getRouter(){
		return $this->router;
	}
	
	/**
	 * このフレームワークで使用するルータを設定します。
	 * @access public
	 * 
	 * @param framework\core\router\core_router_IRouter ルータオブジェクト
	 * 
	 * @return framework\core\core_Configuration このクラスのインスタンス
	 */
	public function setRouter(core_router_IRouter $router){
		
		$this->router = $router;
		
		return $this;
	}
	
	
	public function getLogger(){
	}
	
	
	public function setLogger(){
	
		return $this;
	}
	
	
	public function addIncludePath($path){
	
		return $this;
	}
	
	
	public function addAutoLoader($function){
		
		spl_autoload_register($function);
		
		return $this;
	}
}