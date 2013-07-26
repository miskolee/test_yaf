<?php
/* ============================================================
 * @name:    ${NAME}
 * @author:  Misko Lee
 * @created: 13-7-26
 * @version: 0.11
 * @Copyright ${Time} ©pencilinside
 * ===========================================================*/
class Wall_UserModel extends Model
{


    protected  function _setup(){
        $this->_name = 'wx_user';
        parent::_setup();
    }

    public function insert($data){
        //todo 添加数据验证
        return parent::insert($data);
    }


}
?>