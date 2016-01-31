<?php
/**
 * Created by kingyqs.
 * User: All
 * Date: 2015/8/29
 * Time: 13:51
 * Usage:
 */

#����MVC�������
require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'sysconf'. DIRECTORY_SEPARATOR .'Config.inc.php');
#����MVC���·����
#require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .'Router.class.php');


#���������ຯ��
if(is_callable('spl_autoload_register')){
    spl_autoload_register('loadClass');
}else{
    function __autoload($className){
        loadClass($className);
    }
}
#�Զ����뺯��
function loadClass($className){
    $classFile = MVC_ROOT_PATH . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR .$className. '.class.php';
    if(!file_exists($classFile)) exit('Class File '.$className.' Not Exist!');
    require($classFile);
}

#***************************************************#
#·�����ദ��request_url���ҵ��������Ϳ���������

Router::initRouter();
$control = Router::getController();
$method = Router::getMethod();

define('CONTROL', $control);#�������������
define('METHOD', $method);#���������������
