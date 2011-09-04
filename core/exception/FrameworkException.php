<?php namespace core\exception;

/**
 * フレームワークの基本例外
 *
 * @author kmaitani
 */
class FrameworkException extends \Exception{


	/**
	 * コンストラクタ
	 * @access public
	 *
	 * @param int       $statusCode この例外をHTTPステータスコードとして表した時の値
	 * @param string    $message    エラーメッセージ
	 * @param Exception $cause      この例外の原因となった例外
	 */
	public function __construct($statusCode = 500, $message = "something error occurred.", Exception $cause = null){
		parent::__construct($message, $statusCode, $cause);
	}
}