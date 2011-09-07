<?php namespace core\engine;


/**
 * クライアントへのレスポンスを表す
 * レスポンスオブジェクトです。
 *
 * @author kamekoopa
 */
class Response {

	/**
	 * @access private
	 * @var int HTTPステータスコード
	 */
	private $httpStatus;

	/**
	 * @access private
	 * @var string レスポンスボディ
	 */
	private $responseBody;

	/**
	 * @access private
	 * @var array レスポンスヘッダを表す連想配列
	 */
	private $responseHeaders;


	/**
	 * コンストラクタ
	 * @access public
	 *
	 * @param int    $httpStatus       HTTPステータスコード
	 * @param string $responseBody     レスポンスボディ
	 * @param array  $hresponseHeaders レスポンスヘッダを表す連想配列
	 */
	public function __construct($httpStatus, $responseBody, $responseHeaders = array()){

		$this->httpStatus      = $httpStatus;
		$this->responseBody    = $responseBody;
		$this->responseHeaders = $responseHeaders;
	}


	/**
	 * HTTPステータスコードを返します
	 *
	 * @access public
	 *
	 * @return int HTTPステータスコード
	 */
	public function getHttpStatus(){
		return $this->httpStatus;
	}


	/**
	 * レスポンスヘッダを表す連想配列を返します。
	 *
	 * @access public
	 *
	 * @return array レスポンスヘッダ連想配列
	 */
	public function getResponseHeaders(){
		return array();
	}


	/**
	 * レスポンスボディを返します。
	 *
	 * @access public
	 *
	 * @return string レスポンスボディ
	 */
	public function getResponseBody(){
		return $this->responseBody;
	}
}