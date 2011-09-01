<?php namespace core\engine;


/**
 *
 * @author kamekoopa
 */
class ApacheEngine implements IEngine{


	/**
	 * コンストラクタ
	 */
	public function __construct(){
		ob_start();
	}


	/**
	 * (non-PHPdoc)
	 * @see \core\engine.IEngine::getRequest()
	 */
	public function getRequest(){

		return new Response();
	}


	/**
	 * (non-PHPdoc)
	 * @see \core\engine.IEngine::sendResponse()
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