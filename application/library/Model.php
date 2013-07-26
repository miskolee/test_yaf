<?php
/* ============================================================
 * @name:    ${NAME}
 * @author:  Misko Lee
 * @created: 13-7-25
 * @version: 0.11
 * @Copyright ${Time} ©pencilinside
 * ===========================================================*/
/*
class Model
{

protected $config = '';
protected $instance = '';

protected $pk = 'id';
protected $realTableName = '';
protected $Prefix = '';

    public function __construct($config='',$realTableName=''){
       $this->config = $config;
        if(!$config){
            $this->config = include APP_PATH.'/conf/db.php';

        }

        $realTableName = strtolower($realTableName);
        if(!$realTableName){
            $this->realTableName  = strtolower(preg_replace('/Model/','',get_class($this)));
             $this->realTableName =  $this->config['prefix'].$this->realTableName;
            }else{
            $this->realTableName = $this->config['prefix']->$realTableName;
        }
        $this->instance = Zend_Db::factory('PDO_MYSQL',$this->config);
    }

    public function __get($var){
        return $this->instance->$var;
    }

    public function __call($func,$args){
        $argStr = '';
        if($args){

        for($i = 0; $i<count($args);$i++){
            $argStr.='$args['.$i.'],';
        }
        $argStr = rtrim($argStr,',');
        }
        $class = $this->instance;
        $result = '';
        eval('$result = $class->$func('.$argStr.');');
        return $result;
    }

    public function select(){
        $select = $this->instance->select();

        $select->from($this->realTableName,'*');
        return $select;
    }




}
*/

class Model extends Zend_Db_Table
{
    public $zendDb ='';
    public function __construct($config=''){
        $this->zendDb = self::zend();
        parent::__construct();
    }

    public static function zend($config=''){
        $db = Zend_Db::factory('PDO_MYSQL',config2zend($config));
        Zend_Db_Table::setDefaultAdapter($db);
        return $db;
    }
}
?>