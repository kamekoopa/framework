<?php

/**
 * 名前空間を用いたクラスオートローダです。
 * 登録されたインクルードパスをルートとして
 * 名前空間をそこからのディレクトリ構造として解釈します。
 *
 * @author kamekoopa
 */
class MyFwAutoLoader {

	/**
	 * クラス探索の起点となるインクルードパスを追加します
	 *
	 * @access public
	 * @static
	 *
	 * @param string $inludePath 登録するインクルードパス
	 */
	public static function register($includePath){

		//指定されたディレクトリの最後に / がついていなければつける
		if(!preg_match('/^.*?\/$/', $includePath)){
			$includePath = $includePath . "/";
		}

		$includePath = str_replace("\\", "/" , $includePath);

		$function = function($className) use ($includePath){

			$classFileName = $includePath . str_replace("\\", "/", $className) . ".php";

			if( is_readable($classFileName) ){
				require_once $classFileName;
			}else{
				return false;
			}
		};

		spl_autoload_register($function);
	}
}