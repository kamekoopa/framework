<?php namespace core;

use core\router\IRouter;

use core\engine\IEngine;

use core\generator\AbstractGenerator;


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
	 * @var string ウェブアプリのルートディレクトリ
	 */
	private $appRootDir;


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
	 * @access private
	 * @var \core\generator\AbstractGenerator 使用するジェネレータクラス
	 */
	private $generator;


	/**
	 * コンストラクタ(非公開)
	 * @access private
	 *
 	 * @param string $appRootDir ウェブアプリのルートディレクトリ
	 */
	private function __construct($appRootDir){

		$this->appRootDir = $appRootDir;
	}


	/**
	 * 設定クラスの唯一のインスタンスを取得します
	 *
	 * @access public
	 * @static
	 *
	 * @param string $appRootDir ウェブアプリのルートディレクトリ
	 *
	 * @return \core\Configuration このクラスのインスタンス
	 */
	public static function getInstance($appRootDir){

		if(self::$me == null){
			self::$me = new self($appRootDir);
		}

		return self::$me;
	}


	/**
	 * ウェブアプリのルートディレクトリを取得します。
	 *
	 * @access public
	 *
	 * @return string ウェブアプリのルートディレクトリ
	 */
	public function getAppRootDir(){
		return $this->appRootDir;
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



	/**
	 * このフレームワークで使用するジェネレータを取得します。
	 *
	 * @access public
	 *
	 * @return \core\generator\AbstractGenerator ジェネレータオブジェクト
	 */
	public function getGenerator(){
		return $this->generator;
	}


	/**
	 * このフレームワークで使用するジェネレータを設定します。
	 * @access public
	 *
	 * @param \core\generator\AbstractGenerator ジェネレータオブジェクト
	 *
	 * @return \core\Configuration このクラスのインスタンス
	 */
	public function setGenerator(AbstractGenerator $generator){

		$this->generator = $generator;

		return $this;
	}


	public function getLogger(){
	}


	public function setLogger(){

		return $this;
	}
}