<?php namespace core\engine;

/**
 * クライアントからのリクエスト情報を表す
 * リクエストオブジェクトです。
 *
 * @author kamekoopa
 */
class Request {

	/**
	 * @access private
	 * @var string リクエストメソッド
	 */
	private $method;

	/**
	 * @access private
	 * @var string リクエストされたURL
	 */
	private $requestUrl;


	/**
	 * @access private
	 * @var string リクエストヘッダ文字列
	 */
	private $headerString;

	/**
	 * @access private
	 * @var string GETクエリ文字列
	 */
	private $queryString;

	/**
	 * @access private
	 * @var string リクエストボディ文字列
	 */
	private $requestBodyString;


	/**
	 * コンストラクタ
	 *
	 * @access public
	 *
	 * @param string $method リクエストメソッド
	 * @param string $requestUrl リクエストURL
	 * @param string $headerString リクエストヘッダ文字列
	 * @param string $queryString クエリ文字列
	 * @param string $requestBodyString リクエストボディ文字列
	 */
	public function __construct($method, $requestUrl, $headerString, $queryString, $requestBodyString){
		$this->method = $method;
		$this->requestUrl = $requestUrl;
		$this->headerString = $headerString;
		$this->queryString = $queryString;
		$this->requestBodyString = $requestBodyString;
	}


	/**
	 * リクエストメソッドを大文字で返します
	 * @access public
	 *
	 * @return string リクエストメソッド(大文字)
	 */
	public function getMethod(){
		return strtoupper($this->method);
	}


	/**
	 * リクエストされたURLを返します。
	 * @access public
	 *
	 * @return string リクエストURL
	 */
	public function getRequestUrl(){
		return $this->requestUrl;
	}


	/**
	 * リクエストURLを設定します。
	 * @access public
	 *
	 * @param string $requestUrl リクエストURL
	 */
	public function setRequestUrl($requestUrl){
		$this->requestUrl = $requestUrl;
	}


	/**
	 * リクエストヘッダを文字列形式で返します。
	 * @access public
	 *
	 * @return string リクエストヘッダの文字列表現
	 */
	public function getRequestHeaderString(){
		$this->headerString;
	}

	/**
	 * リクエスヘッダを文字列形式で設定します。
	 * @access public
	 *
	 * @param string $headerString 設定するヘッダ文字列
	 */
	public function setRequestHeaderString($headerString){
		$this->headerString = $headerString;
	}


	/**
	 * リクエストヘッダを連想配列形式で返します。
	 * @access public
	 *
	 * @return array リクエストヘッダの連想配列表現
	 */
	public function getRequestHeaderArray(){

		$arr = array();
		parse_str($this->getRequestHeaderString(), $arr);

		return $arr;
	}


	/**
	 * クエリ文字列を返します。
	 * @access public
	 *
	 * @return string リクエストのクエリ文字列
	 */
	public function getQueryString(){
		return $this->queryString;
	}


	/**
	 * クエリ文字列を設定します
	 * @access public
	 *
	 * @param string $queryString 設定するクエリ文字列
	 */
	public function setQueryString($queryString){
		$this->queryString = $queryString;
	}


	/**
	 * リクエストのクエリ情報を連想配列表現で返します。
	 * @access public
	 *
	 * @return array リクエストクエリの連想配列表現
	 */
	public function getQueryArray(){
		$arr = array();
		parse_str($this->getQueryString(), $arr);

		return $arr;
	}


	/**
	 * リクエストボディ文字列を返します
	 * @access public
	 *
	 * @return string リクエストボディ文字列
	 */
	public function getRequestBodyString(){
		return $this->requestBodyString;
	}


	/**
	 * リクエストボディ文字列を設定します
	 * @access public
	 *
	 * @param $requestBodyString 設定するリクエストボディ文字列
	 */
	public function setRequestBodyString($requestBodyString){
		$this->requestBodyString = $requestBodyString;
	}


	/**
	 * リクエストボディの連想配列表現を返します。
	 * @access
	 *
	 * @return array リクエストボディの連想配列表現
	 */
	public function getRequestBodyArray(){
		$arr = array();
		parse_str($this->getRequestBodyString(), $arr);

		return $arr;
	}
}