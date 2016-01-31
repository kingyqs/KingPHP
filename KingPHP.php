<?php

/**
 * 简单的框架MVC入口类
 */
final class KingPHP{

	#构造方法
	function __construct(){
	}
	
	public static function run(){
		self::setConf();		#框架的配置
		self::createDemo();		#创建测试文件
		self::loadSysFile();	#载入框架核心文件
		self::runMVC();			#启动MVC框架
	}

	private static function setConf(){
		require_once('KingPHP.config.php');
	}

	private static function createDemo(){
		if(is_dir(CONTROL_PATH) || is_dir(TPL_PATH)) return;#如果已经创建应用,就不用再创建
		self::createDir();#不存在就创建目录
		$data =<<<str
<?php
/**
* MVC创建的测试控制器
*/
class IndexControl extends Control{

	public function index(){
		echo '<h1>Welcome to KingPHP MVC!</h1>';
	}

}
str;
		$filename = CONTROL_PATH . DIRECTORY_SEPARATOR .'IndexControl.php';
		is_file($filename) || file_put_contents($filename, $data);
	}


	private static function createDir(){
		if(is_dir(APP_PATH)) return;#如果存在就直接返回
		$dirArr = array(
			APP_PATH,
			CONTROL_PATH,
			TPL_PATH,
			COMPILE_PATH,
			CACHE_PATH,
		);

		foreach ($dirArr as $dirname) {
			is_dir($dirname) || mkdir($dirname,0777,true);#短路特性，如果是目录就创建，否则就不创建
		}

	}

	private static function loadSysFile(){
		$SysFileArr = array(
			MVC_ROOT_PATH . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Util.inc.php',#公共函数库
			MVC_ROOT_PATH . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Control.class.php',#所有控制器父类
			MVC_ROOT_PATH . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Model.class.php'#操作数据库类
		);
		foreach ($SysFileArr as $filename) {
			is_file($filename) && require($filename); #如果是核心文件，载入错误则框架运行不成功
		}
	}

	private static function runMVC(){
		$controlFile = CONTROL_PATH . DIRECTORY_SEPARATOR . CONTROL . 'Control.php';
		if(!is_file($controlFile) || !file_exists($controlFile)) exit('File ' . CONTROL . 'Control.php Not Exist!'.PHP_EOL);
		require($controlFile);
		$control = CONTROL .'Control';
		$method = METHOD;
		$obj = new $control;
		if(!is_subclass_of($obj, 'Control')) exit('Class '.$control .' Not Extends Control!'.PHP_EOL);#判断控制是否继承父类Control
		if(!method_exists($obj,$method)) exit('The '.$control." Of Method '".$method."' Not Exist!"); #判断控制类是否存在此方法
		$obj->$method();
	}



}

#运行框架
KingPHP::run();



