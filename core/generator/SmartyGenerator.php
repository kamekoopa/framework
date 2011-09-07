<?php namespace core\generator;

use \core\Configuration;


/**
 * テンプレートエンジンとしてSmartyを利用するように実装されたジェネレータです。
 *
 * @author kamekoopa
 */
class SmartyGenerator extends AbstractGenerator{


	/**
	 * @access protected
	 * @var \Smarty Smartyのインスタンス
	 */
	protected $smarty;


	/**
	 * コンストラクタ
	 *
	 * @access public
	 *
	 * @param \core\Configuration $config このジェネレータが利用する設定クラス
	 */
	public function __construct(Configuration $config){
		$this->smarty = self::createSmartyInstance($config);
	}


	/**
	 * (non-PHPdoc)
	 * @see core/generator/core\generator.AbstractGenerator::assign()
	 */
	public function assign($key, $value) {
		$this->smarty->assign($key, $value);
	}


	/**
	 * (non-PHPdoc)
	 * @see core/generator/core\generator.AbstractGenerator::createResponseBody()
	 */
	protected function createResponseBody(){
		return $this->smarty->fetch($this->templateFile);
	}


	/**
	 * Smartyのインスタンスを作成します。
	 *
	 * @access private
	 * @static
	 *
	 * @param \core\Configuration $config Smarty構築に利用する設定オブジェクト
	 *
	 * @return \Smary 生成されたSmartyオブジェクト
	 */
	private static function createSmartyInstance(Configuration $config){

		require_once 'lib/Smarty/libs/Smarty.class.php';

		$smarty = new \Smarty();

		$viewDir = $config->getAppRootDir() . "views/";

		$smarty->template_dir = $viewDir . '/';
		$smarty->compile_dir  = $viewDir . 'templates_c/';
		$smarty->config_dir   = $viewDir . 'configs/';
		$smarty->cache_dir    = $viewDir . 'cache/';

		$smarty->caching = true;

		return $smarty;
	}
}