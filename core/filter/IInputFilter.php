<?php namespace core\filter;

use \core\engine\Request;

/**
 * 入力フィルタが実装スべきインタフェースです。
 * 入力フィルタは、フィードされたリクエストオブジェクトを変更します。
 *
 * @author kamekoopa
 */
interface IInputFilter {


	/**
	 * リクエストに対してフィルターを実行します。
	 *
	 * @access public
	 * @param \core\engine\Request $request フィルタを適用するリクエスト
	 *
	 * @return \core\engine\Request フィルタが適用されたリクエスト
	 */
	public function filterInput(Request $request);
}