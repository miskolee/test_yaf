<?php
/* ============================================================
 * @name:    ${NAME}
 * @author:  Misko Lee
 * @created: 13-7-25
 * @version: 0.11
 * ©Copyright ${Time} Released under the MIT license
 * http://www.imisko.com/license
 * ===========================================================*/

class BootstrapException extends Exception
{
}

;


class Bootstrap extends Yaf_Bootstrap_Abstract
{
    //检测运行时环境
    public function _initCheckRunTime()
    {
        //PHP 版本检测
        if (version_compare('5.3.0', PHP_VERSION) > 0) {
            throw new BootstrapException('php version too low');
        }
        //系统运行必须使用的扩展
        $moudles = array(
            'memcache',
            'mysql'
        );

        for ($i = 0; $i < count($moudles); $i++) {
            if (!extension_loaded($moudles[$i])) {
                throw new BootstrapException("can't load extension moudle :" . $moudles[$i]);
            }
        }
        /**********   扩展检测完毕   *****/
    }

    /** 路由器初始化 */
    public function _initRouter(Yaf_Dispatcher $dispatcher){
        $router = Yaf_Dispatcher::getInstance()->getRouter();
        $route = new Yaf_Route_Simple("m","c","a");
        $router->addRoute("myroute",$route);

    }
    /** 应用初始化 */
    public function _initApplication($dispatcher)
    {
        //开启异常/错误模式
        $dispatcher->throwException(true);
        //访问数+1
      /*  $mem = new Memcache();
        $mem->connect('localhost');
        $mem->increment('vistied_count', 1);
        echo $mem->get('vistied_count');
      */

        require_once LIBRARY_PATH.'db.function.php';
       // require_once LIBRARY_PATH.'core.function.php';
        require_once LIBRARY_PATH.'/extension.function.php';
        ini_set('include_path',APP_PATH.'/application/library/');

    }


/** 初始化插件 */
    public function _initPlugin($dispatcher){
            $user = new TestPlugin();
        $dispatcher->registerPlugin($user);
    }

}

?>