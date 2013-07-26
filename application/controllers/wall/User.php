<?php
/* ============================================================
 * @name:    ${NAME}
 * @author:  Misko Lee
 * @created: 13-7-25
 * @version: 0.11
 * @Copyright ${Time} ©pencilinside
 * ===========================================================*/

class Wall_UserController extends RestController
{
    /** 使用用户id获取信息
     *@param int $id 用户Id 必须
     *@param string $type 数据格式，默认json
     * */
    public function get_by_idAction($id, $type = 'json')
    {
        if (!$id) {
            $this->missing_argument();
        }
        $sql = "select * from wx_user where id=$id";
        $data = get_line($sql);
        echo  render_data($data, $type);
    }

    /** 修改用户数据，只接收post请求
     * 插入一个新用户
     * 仅支持post提交*/
    public function insertAction()
    {
        $data = $_POST;
        if (!$data) {
            $this->missing_argument();
        }
        $table = new Wall_UserModel();
        //insert方法已重载用作数据验证
        $id = $table->insert($data);
    }

    /** 分页获取用户资料 */
    public function get_by_pageAction($page = 1, $limit = 10, $order = 'create_time', $type = 'json')
    {
        $limitSql = ($page - 1) * $limit . ',' . $limit;
        $sql = "select * from wx_user order by $order limit $limitSql";
        $data = get_data($sql);
        echo render_data($data, $type);
    }

    /** 删除用户。敏感操作，需要使用密文 */
    public function delete_by_idAction($id, $token)
    {
        if (valid_token($token)) {
            db();
            $sql = "delete from wx_user where id=$id";
            $data = run_sql($sql);
        } else {
            echo '密文验证失败!';
        }
    }


}

?>