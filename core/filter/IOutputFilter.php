<?php namespace core\filter;

/**
 * 出力フィルタが実装すべきインタフェースです。
 * 出力フィルタは、レスポンスが送信される前に実行され
 * レスポンスボディに対してフィルターを実行します。
 *
 * @author kamekoopa
 */
interface IOutputFilter {

	/**
	 * 出力フィタを実行します。
	 *
	 * @access public
	 * @param string $output フィルタを適用するレスポンスボディ
	 *
	 * @return string フィルタが適用されたレスポンスボディ
	 */
	public function filterOutput($output);
}