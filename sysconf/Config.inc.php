<?php
/**
 * Created by kingyqs.
 * User: All
 * Date: 2015/8/29
 * Time: 14:26
 * Usage:
 */


#MVC��ܵĸ�Ŀ¼
define('MVC_ROOT_PATH', dirname(dirname(__FILE__)));
#������վ��Ŀ¼
define('ROOT', dirname($_SERVER['SCRIPT_FILENAME']));
#����Ӧ��Ŀ¼
define('APP_PATH', ROOT . DIRECTORY_SEPARATOR . APP);
#����Ӧ�ÿ���Ŀ¼
define('CONTROL_PATH', APP . DIRECTORY_SEPARATOR . 'control');



#smartyģ���ļ�Ŀ¼
define('TPL_PATH', APP . DIRECTORY_SEPARATOR .'tpl');
#smarty����Ŀ¼
define('COMPILE_PATH', ROOT . DIRECTORY_SEPARATOR .'temp'. DIRECTORY_SEPARATOR .'runtime');
#��̬���濪��
define('OPEN_SMARTY_CACHE',0);
#��̬����ʱ��
define('SMARTY_CACHE_TIME', 3600);
#smarty����Ŀ¼
define('CACHE_PATH', ROOT . DIRECTORY_SEPARATOR .'temp'. DIRECTORY_SEPARATOR .'cache');
#smartyģ�����
define('SMARTY_LEFT_DELIMITER','{:');
define('SMARTY_RIGHT_DELIMITER','}');




