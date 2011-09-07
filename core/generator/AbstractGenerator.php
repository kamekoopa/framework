<?php namespace core\generator;

use \core\engine\Response;
use \core\filter\IOutputFilter;

/**
 * ジェネレータオブジェクトの基底抽象クラスです。
 * ジェネレータは各テンプレートエンジンに対するアダプターとなります。
 * 任意のテンプレートエンジンを利用する場合は
 * このクラスのサブクラスをアダプターとして実装してください。
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
	 * @var array ジェネレータに設定されている出力フィルタの配列
	 */
	protected $outputFilters = array();


	/**
	 * @access protected
	 * @var string テンプレートファイルへのパス
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
	 * 出力フィルタを追加します。
	 *
	 * @access public
	 *
	 * @param \core\filter\IOutputFilter $outputFilter 追加する出力フィルタ
	 */
	public function addOutputFilter(IOutputFilter $outputFilter){
		$this->outputFilters[] = $outputFilter;
	}


	/**
	 * テンプレートエンジンへ値をアサインします。
	 *
	 * @access public
	 * @abstract
	 *
	 * @param string $key   キー値
	 * @param string $value キーに対する値
	 */
	public abstract function assign($key, $value);


	/**
	 * テンプレートファイルのパスを設定します。
	 *
	 * @access public
	 *
	 * @param string $path テンプレートファイルへのパス(viewsディレクトリからの相対パス)
	 */
	public function setTemplateFile($filePath){
		$this->templateFile = $filePath;
	}


	/**
	 * 設定されている情報でレスポンスを生成します。
	 *
	 * @access public
	 * @abstract
	 *
	 * @param int $httpStatus 送信するHTTPステータスコード
	 *
	 * @return \core\engine\Response 生成されたレスポンスオブジェクト
	 */
	public function generate($httpStatus){

		$responseBody = $this->createResponseBody();

		foreach($this->outputFilters as $outputFilter){
			$responseBody = $outputFilter->filterOutput($responseBody);
		}

		return new Response($httpStatus, $responseBody, $this->responseHeaders);
	}


	/**
	 * アサインされている値やテンプレートファイルの情報などを元に
	 * 実際に送信するレスポンスの本文となる文字列を作成します。
	 *
	 * @access protected
	 * @abstract
	 *
	 * @return string レスポンスボディとなるべき文字列
	 */
	protected abstract function createResponseBody();
}