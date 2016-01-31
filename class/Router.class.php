<?php
/**
 * Created by kingyqs.
 * User: All
 * Date: 2015/8/25
 * Time: 21:06
 * Usage:
 */

class Router{
    //����Ĳ�������
    private static $requestArr;
    private static $count;

    const PREG_PATTEN = '/^[a-z][a-z_0-9]{0,255}$/';
    //���췽������request_url
    public static function initRouter(){
        $urlFlag = false;
        //����GET������
        $requestUrlArr = explode('?',$_SERVER['REQUEST_URI']);
        //p($requestUrlArr);
        if(preg_match('/.+?\.php(.*)/',$requestUrlArr[0],$match_request_url)){
            $requestUrl = @trim($match_request_url[1],'/');
            self::$requestArr = @explode('/',$requestUrl);
            self::$count = count(self::$requestArr);
            $urlFlag = true;
        }else {
            $requestUrl = @trim($requestUrlArr[0],'/');
            self::$requestArr = @explode('/',$requestUrl);
            self::$count = count(self::$requestArr);
            $urlFlag = true;
        }
        //����ʧ�ܣ�����
        $urlFlag or exit('Get Url Control or method failed');
        //����GET����
        self::getParam();
    }

    /**
 * @return mixed
 * ���ؿ���������
 */
    public static function getController(){
        $controller = self::$requestArr[0] ? self::$requestArr[0] : 'index';
        try{
            //��֤�������Ƿ���ȷ
            $result = preg_match(self::PREG_PATTEN, $controller,$match);
            if( $result && !empty($match) ){
                return ucfirst(self::getTrueName($controller));
            }
            throw new Exception("The Url Of Control '".$controller."' Syntax Error");
        }catch (Exception $e){
            //echo 'Error:Code:'.$e->getCode().',File:'.$e->getFile().',Line:'.$e->getLine().',Message:'.$e->getMessage();
            exit($e->getMessage());
        }

    }

    /**
     * @return mixed
     * ���ؿ���������
     */
    public static function getMethod(){
       if(self::$count > 1){
           try{
               //��֤�������Ƿ���ȷ
               $result = preg_match(self::PREG_PATTEN, self::$requestArr[1],$match);
               if( $result && !empty($match) ){
                   return self::getTrueName(self::$requestArr[1]);
               }
               throw new Exception("The Url Of Method '".self::$requestArr[1]."' Syntax Error");
           }catch (Exception $e){
               //echo 'Error:Code:'.$e->getCode().',File:'.$e->getFile().',Line:'.$e->getLine().',Message:'.$e->getMessage();
               exit($e->getMessage());
           }
       }else{
           return 'Index';
       }

    }

    /**
     * ����GET����
     */
    private static function getParam(){
        $countParam = self::$count;
        if( $countParam>3 && ( ($countParam - 2) % 2 == 0) ){
            for( $i=2; $i < $countParam; $i++ ){
                if( $i % 2 == 0 ){
                    $_GET[self::$requestArr[$i]] = self::$requestArr[$i+1];
                }
            }
        }
    }

    /**
     * @param $name
     * @return mixed|string
     * �շ巨��׼��������
     */
    private static function getTrueName($name){
        $nameArr = explode('_',$name);
        //������һԪ��
        $firstName = array_shift($nameArr);
        foreach($nameArr as $v){
            $firstName .= ucfirst($v);
        }
        return $firstName;
    }






}