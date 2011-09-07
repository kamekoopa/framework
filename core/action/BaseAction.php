<?php namespace core\action;

use \core\Configuration;
use \core\engine\Request;
use \core\generator\AbstractGenerator;

/**
 * 基底アクションクラス
 * アプリケーションは少なくともindexメソッドを実装する必要があります。
 * また、このクラスにもサブクラスにも実装されていないメソッドが実行された場合
 * indexメソッドが実行されます。
 *
 * リクエストに対応するメソッドを追加する場合はサブクラスに下記のシグネチャで
 * メソッドを追加してください。
 *
 * Route $route = public function {メソッド名}(Request $request){ ... }
 *
 * @author kamekoopa
 */
abstract class BaseAction{

	/**
	 * @access private
	 * @var \core\engine\Request このアクションに要求されたリクエストを表すオブジェクト
	 */
	private $request;


	/**
	 * @access private
	 * @var \core\generator\AbstractGenerator このアクションが利用するレスポンスジェネレータ
	 */
	private $generator;


	/**
	 * コンストラクタ
	 * このクラスが構築される際、設定されているフィルタクラスによって
	 * リクエストオブジェクトやジェネレータオブジェクトは変更される可能性があります。
	 *
	 * @access public
	 *
	 * @param \core\engine\Request $request アクションに対して要求されているリクエスト
	 * @param \core\generator\AbstractGenerator $generator このアクションが利用するジェネレータオブジェクト
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
	 * デフォルトメソッド
	 * サブクラスはこのメソッドを必ず実装する必要があります。
	 * また、存在しないメソッドを要求された場合も、このメソッドへフィードされます。
	 *
	 * @access public
	 * @abstract
	 *
	 * @param \core\engine\Request $request リクエストオブジェクト
	 *
	 * @return \core\router\Route 次にフォワードする先を表すルーティング情報オブジェクト。次へフォワードしない場合はnull
	 */
	public abstract function index(Request $request);



	/**
	 * リクエストに適用する入力フィルタの配列を取得します。
	 * フィルタは配列の先頭から順に適用されます。
	 *
	 * @access public
	 *
	 * @return array \core\filter\IInputFilterを実装したクラスの配列
	 */
	protected function getInputFilters(){
		return array();
	}


	/**
	 * レスポンスに対して適用する出力フィルタの配列を取得します。
	 * フィルタは、配列の先頭から順に適用されます。
	 *
	 * @access public
	 *
	 * @return array \core\filter\IOutputFilterを実装したクラスの配列
	 */
	protected function getOutputFilters(){
		return array();
	}


	/**
	 * フレームワークに設定されているジェネレータに、値をアサインします
	 *
	 * @access protected
	 *
	 * @param string $key   値に対するキー
	 * @param mixed  $value アサインする値
	 *
	 * @return void
	 */
	protected function assign($key, $value){

		$this->generator->assign($key, $value);
	}


	/**
	 * このアクションが利用するテンプレートファイルを変更する必要がある場合
	 * そのパスを、viewsディレクトリからの相対パスで指定します
	 *
	 * @access protected
	 *
	 * @param string $path テンプレートファイルへのパス
	 *
	 * @return void
	 */
	protected function setTemplateFile($path){
		$this->generator->setTemplateFile($path);
	}
}
