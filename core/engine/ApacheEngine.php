<?php namespace core\engine;


/**
 * PHPのApache依存機能を用いて
 * クライアントからのリクエスト、及びクライアントへのレスポンス情報を
 * 生成、送出します。
 *
 * @author kamekoopa
 */
class ApacheEngine implements IEngine{


	/**
	 * コンストラクタ
	 *
	 * @access public
	 */
	public function __construct(){

		//出力バッファリングスタート
		ob_start();
	}


	/**
	 * (non-PHPdoc)
	 * @see core/engine/core\engine.IEngine::getRequest()
	 */
	public function getRequest(){

		$protocol = !empty($_SERVER["HTTPS"]) ? "https" : "http";

		$queryString = $_SERVER["QUERY_STRING"];
		$separator = !empty($queryString) ? "?" : "";

		$method = $_SERVER["REQUEST_METHOD"];
		$requestUrl = "{$protocol}://{$_SERVER["HTTP_HOST"]}{$_SERVER["REQUEST_URI"]}{$separator}{$queryString}";
		$headerString = http_build_query(apache_request_headers());
		$requestBodyString = file_get_contents("php://input");

		return new Request($method, $requestUrl, $headerString, $queryString, $requestBodyString);
	}


	/**
	 * (non-PHPdoc)
	 * @see core/engine/core\engine.IEngine::sendResponse()
	 */
	public function sendResponse(Response $response){

		//ヘッダ出力
		foreach($response->getResponseHeaders() as $headerName => $headerValue){
			header("{$headerName}: {$headerValue}", true, $response->getHttpStatus());
		}

		//出力バッファflush
		for($i=0; $i < ob_get_level(); $i++){
			ob_end_flush();
		}

		//レスポンス出力
		echo $response->getResponseBody();
	}
}