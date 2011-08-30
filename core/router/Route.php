<?php namespace framework\core\router;

/**
 * ルーティングオブジェクト
 * @author kamekoopa
 */
class core_router_Route {

	/**
	 * 実行するアクションクラスの名前
	 * @var string
	 * @access private
	 */
	private $actionClassName;
	
	/**
	 * 実行するアクションクラスのメソッドの名前
	 * @var string
	 * @access private
	 */
	private $methodName;
	
	/**
	 * コンストラクタ
	 * 
	 * @param string $actionClassName
	 * @param string $methodName
	 */
	public function __construct($actionClassName, $methodName){
		$this->actionClassName = $actionClassName;
		$this->methodName      = $methodName;
	}
	
	/**
	 * Enter description here ...
	 */
	public function getActionClassName(){
		return $this->actionClassName;
	}

	/**
	 * Enter description here ...
	 */
	public function getMethodName(){
		return $this->methodName;
	}
}