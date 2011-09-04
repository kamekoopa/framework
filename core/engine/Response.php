<?php namespace core\engine;

/**
 * レスポンスオブジェクト
 *
 * @author kamekoopa
 */
class Response {

	public function __construct(){
	}

	public function getHttpStatus(){
		return 200;
	}

	public function getResponseHeaders(){
		return array();
	}

	public function getResponseBody(){
		return "";
	}
}