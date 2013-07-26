<?php
/* ============================================================
 * @name:    ${NAME}
 * @author:  Misko Lee
 * @created: 13-7-25
 * @version: 0.11
 * @Copyright ${Time} ©pencilinside
 * ===========================================================*/

class RestController extends Yaf_Controller_Abstract
{
    protected $db ;

    public function init(){
        //关闭视图模块
        Yaf_Dispatcher::getInstance()->disableView();
       //读取当前模块数据库配置
        $config = APP_PATH.'/conf/';
        $name = get_class($this);
        $name = explode('_',$name);
        unset($name[count($name) -1]);
        foreach($name as $c){
            $config.=$c.'/';
        }
        $config.='db.php';
        //连接数据库
        if(file_exists($config)){
            $conf = include $config;
           $this->db = db($conf['db_host'],$conf['db_port'],$conf['db_user'],$conf['db_password'],$conf['db_name']);
        }else{
        $this->db = db();
        }
    }



    public function missing_argument(){
            http_status(404);
            echo "missing argument ....";
    }
}
?>