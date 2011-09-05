<?php namespace core\generator;

use \core\engine\Response;
use \core\filter\IOutputFilter;

/**
 *
 * @author kamekoopa
 */
abstract class AbstractGenerator {

	/**
	 * @access protected
	 * @var array レスポンスヘッダを表す連想配列
	 */
	protected $responseHeaders = array();


	/**
	 * @access protected
	 * @var array
	 */
	protected $outputFilters = array();


	/**
	 * @access protected
	 * @var string
	 */
	protected $templateFile;


	/**
	 * レスポンスヘッダを追加します
	 *
	 * @access public
	 *
	 * @param string $headerName ヘッダ名
	 * @param string $headerValue ヘッダ値
	 */
	public function addHeader($headerName, $headerValue){
		$this->responseHeaders[$headerName] = $headerValue;
	}


	/**
	 * @access public
	 *
	 * @param \core\filter\IOutputFilter $outputFilter
	 */
	public function addOutputFilter(IOutputFilter $outputFilter){
		$this->outputFilters[] = $outputFilter;
	}


	/**
	 * @access public
	 * @abstract
	 *
	 * @param string $key キー値
	 * @param string $value キーに対する値
	 */
	public abstract function assign($key, $value);


	/**
	 *
	 * @access public
	 *
	 * @param string $path
	 */
	public function setTemplateFile($filePath){
		$this->templateFile = $filePath;
	}


	/**
	 * @access public
	 * @abstract
	 *
	 * @param int $httpStatus HTTPステータスコード
	 *
	 * @return \core\engine\Response レスポンスオブジェクト
	 */
	public function generate($httpStatus){

		$responseBody = $this->createResponseBody();

		foreach($this->outputFilters() as $outputFilter){
			$responseBody = $outputFilter->filterOutput($responseBody);
		}

		return new Response($httpStatus, $responseBody, $this->responseHeaders);
	}


	/**
	 * @access protected
	 * @abstract
	 *
	 * @return string
	 */
	protected abstract function createResponseBody();

}
