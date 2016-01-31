<?php
/**
 * Created by kingyqs.
 * User: All
 * Date: 2015/8/29
 * Time: 13:51
 * Usage:
 */

#载入MVC框架配置
require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'sysconf'. DIRECTORY_SEPARATOR .'Config.inc.php');
#载入MVC框架路由器
#require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Router.class.php');


#智能载入类函数
if(is_callable('spl_autoload_register')){
    spl_autoload_register('loadClass');
}else{
    function __autoload($className){
        loadClass($className);
    }
}
#自动载入函数
function loadClass($className){
    $classFile = MVC_ROOT_PATH . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .$className. '.class.php';
    if(!file_exists($classFile)) exit('Class File '.$className.' Not Exist!');
    require($classFile);
}

#***************************************************#
#路由器类处理request_url，找到控制器和控制器方法

Router::initRouter();
$control = Router::getController();
$method = Router::getMethod();

define('CONTROL', $control);#定义控制器名称
define('METHOD', $method);#定义控制器方法名
