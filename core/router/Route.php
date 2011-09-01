<?php namespace core\router;

/**
 * ルーティングオブジェクト
 * @author kamekoopa
 */
class Route {

	/**
	 * @var string 実行するアクションクラスの名前
	 * @access private
	 */
	private $actionClassName;
	
	
	/**
	 * @var string 実行するアクションクラスのメソッドの名前
	 * @access private
	 */
	private $methodName;
	
	/**
	 * コンストラクタ
	 * 
	 * @param string $actionClassName 実行するアクションクラスの名前
	 * @param string $methodName 実行するアクションクラスのメソッドの名前
	 */
	public function __construct($actionClassName, $methodName){
		$this->actionClassName = $actionClassName;
		$this->methodName      = $methodName;
	}
	
	
	/**
	 * 実行するアクションクラスの名前を返します
	 * @access public
	 * @return string 実行するアクションクラスの名前
	 */
	public function getActionClassName(){
		return $this->actionClassName;
	}

	
	/**
	 * 実行するアクションクラスのメソッドの名前を返します。
	 * @access public
	 * @return string 実行するアクションクラスのメソッドの名前
	 */
	public function getMethodName(){
		return $this->methodName;
	}
}