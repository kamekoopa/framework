<?php namespace core\generator;

use \core\Configuration;

/**
 * Smartyジェネレータ
 *
 * @author kamekoopa
 */
class SmartyGenerator extends AbstractGenerator{

	/**
	 * @access protected
	 * @var \Smarty
	 */
	protected $smarty;


	/**
	 * コンストラクタ
	 *
	 * @access public
	 *
	 * @param \core\Configuration $config
	 */
	public function __construct(Configuration $config){
		$this->smarty = self::createSmartyInstance($config);
	}


	/**
	 * @access public
	 *
	 * @param string $key
	 * @param mixed  $value
	 *
	 * @return void
	 */
	public function assign($key, $value) {
		$this->smarty->assign($key, $value);
	}


	/**
	 *
	 * @access public
	 *
	 * @return string
	 */
	protected function getResponseBody(){

		return $smarty->fetch($this->templateFile);
	}


	/**
	 * @access private
	 * @static
	 *
	 * @param \core\Configuration $config
	 *
	 * @return \Smary
	 */
	private static function createSmartyInstance(Configuration $config){

		require_once 'lib/Smarty/libs/Smarty.class.php';

		$smarty = new Smarty();

		$viewDir = $config->getAppRootDir() . "view/";

		$smarty->template_dir = $viewDir . 'templates/';
		$smarty->compile_dir  = $viewDir . 'templates_c/';
		$smarty->config_dir   = $viewDir . 'configs/';
		$smarty->cache_dir    = $viewDir . 'cache/';

		$smarty->caching = true;

		return $smarty;
	}
}