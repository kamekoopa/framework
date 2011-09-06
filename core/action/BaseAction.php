<?php namespace core\action;

use \core\Configuration;
use \core\engine\Request;
use \core\generator\AbstractGenerator;

/**
 * 基底アクションクラス
 *
 * @author kamekoopa
 */
abstract class BaseAction{

	/**
	 * @access private
	 * @var \core\engine\Request;
	 */
	private $request;

	/**
	 * @access private
	 * @var \core\generator\AbstractGenerator
	 */
	private $generator;


	/**
	 * コンストラクタ
	 *
	 * @access public
	 *
	 * @param \core\engine\Request $request
	 * @param \core\generator\AbstractGenerator $generator
	 */
	public function __construct(Request $request, AbstractGenerator $generator){

		$this->request   = $request;
		$this->generator = $generator;

		foreach($this->getInputFilters() as $inputFilter){
			$this->request = $inputFilter->filterInput($this->request);
		}

		foreach($this->getOutputFilters() as $outputFilter){
			$this->generator->addOutputFilter($outputFilter);
		}
	}


	/**
	 * デフォルトアクションメソッド
	 *
	 * @access public
	 * @abstract
	 *
	 * @param \core\engine\Request $request リクエストオブジェクト
	 */
	public abstract function index(Request $request);



	/**
	 *
	 * @access public
	 *
	 * @return array()
	 */
	protected function getInputFilters(){
		return array();
	}


	/**
	 * @access public
	 *
	 * @return array
	 */
	protected function getOutputFilters(){
		return array();
	}


	/**
	 * フレームワークに設定されているジェネレータに、値をアサインします
	 *
	 * @access protected
	 *
	 * @return void
	 */
	protected function assign($key, $value){

		$this->generator->assign($key, $value);
	}


	/**
	 *
	 * @access protected
	 *
	 * @return void
	 */
	protected function setTemplateFile($path){
		$this->generator->setTemplateFile($path);
	}
}
