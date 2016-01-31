<?php
/**
 * Created by kingyqs.
 * User: All
 * Date: 2015/8/29
 * Time: 14:26
 * Usage:
 */


#MVC框架的根目录
define('MVC_ROOT_PATH', dirname(dirname(__FILE__)));
#定义网站根目录
define('ROOT', dirname($_SERVER['SCRIPT_FILENAME']));
#定义应用目录
define('APP_PATH', ROOT . DIRECTORY_SEPARATOR . APP);
#定义应用控制目录
define('CONTROL_PATH', APP . DIRECTORY_SEPARATOR . 'control');



#smarty模板文件目录
define('TPL_PATH', APP . DIRECTORY_SEPARATOR .'tpl');
#smarty编译目录
define('COMPILE_PATH', ROOT . DIRECTORY_SEPARATOR .'temp'. DIRECTORY_SEPARATOR .'runtime');
#静态缓存开关
define('OPEN_SMARTY_CACHE',0);
#静态缓存时间
define('SMARTY_CACHE_TIME', 3600);
#smarty缓存目录
define('CACHE_PATH', ROOT . DIRECTORY_SEPARATOR .'temp'. DIRECTORY_SEPARATOR .'cache');
#smarty模板符号
define('SMARTY_LEFT_DELIMITER','{:');
define('SMARTY_RIGHT_DELIMITER','}');




