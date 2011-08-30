<?php namespace framework\core\engine;

/**
 * @author kamekoopa
 */
class core_engine_ApacheEngine implements core_engine_IEngine{

	/**
	 * コンストラクタ
	 */
	public function __construct(){
		ob_start();
	}

	/**
	 * (non-PHPdoc)
	 * @see core/engine/framework\core\engine.core_engine_IEngine::getRequest()
	 */
	public function getRequest(){
		
		return new core_engine_Response();
	}
	
	
	/**
	 * (non-PHPdoc)
	 * @see core/engine/framework\core\engine.core_engine_IEngine::sendResponse()
	 */
	public function sendResponse(core_engine_Response $response){

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