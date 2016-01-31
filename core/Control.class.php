<?php

//权限控制
if(!defined('MVC_ROOT_PATH')) exit('Not Access!');
require MVC_ROOT_PATH . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR  .'Smarty.class.php';
/**
 * 所有控制器的父亲类
 */

class Control{

	private static $_smarty;//smarty模板引擎

	//构造函数
	function __construct(){
		self::runSmarty();
		//_init()初始化方法存在，首先运行
		if(method_exists($this, '_init')){
			$this->_init();
		}

	}	

	public function assign($key, $value){
		self::$_smarty->assign($key, $value);
	}

	public function display($tpl, $cache_id = null, $compile_id = null){
		self::$_smarty->display($tpl, $cache_id, $compile_id);
	}


	private static function runSmarty(){
		self::$_smarty = new Smarty();
		//模板目录
		self::$_smarty->template_dir = TPL_PATH . DIRECTORY_SEPARATOR . CONTROL;
		//编译目录
		self::$_smarty->compile_dir = COMPILE_PATH;
		//缓存目录
		self::$_smarty->caching = OPEN_SMARTY_CACHE;
		self::$_smarty->cache_lifetime = SMARTY_CACHE_TIME;
		self::$_smarty->cache_dir = CACHE_PATH;
		self::$_smarty->left_delimiter = SMARTY_LEFT_DELIMITER;
		self::$_smarty->right_delimiter = SMARTY_RIGHT_DELIMITER;
	}


}