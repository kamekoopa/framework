<?php

/**
 * 名前空間を用いたクラスオートローダ
 *
 * @author kamekoopa
 */
class MyFwAutoLoader {

	/**
	 * クラス探索の起点となるディレクトリを指定し、オートローダを設定します。
	 *
	 * @static
	 * @param string $inludePath ディレクトリ名
	 */
	public static function register($includePath){

		if(!preg_match('/^.*?\/$/', $includePath)){
			$includePath = $includePath . "/";
		}

		$includePath = str_replace("\\", "/" , $includePath);

		$function = function($className) use ($includePath){

			$classFileName = $includePath . str_replace("\\", "/", $className) . ".php";
			echo $classFileName . "\r\n";
			if( is_readable($classFileName) ){
				require_once $classFileName;
			}else{
				return false;
			}
		};

		spl_autoload_register($function);
	}
}