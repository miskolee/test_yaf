test_yaf
========
test of yaf framework

---以下为yaf学习结果。

整个系统运行从 bootstrap开始。
bootstrap需要以下工作
1.系统运行环境检测.php版本,必备扩展库等。
2.初始化系统环境
3.注册默认插件

-1.利用Controller的前缀区别不同模块。示例中的Wall_UserController为Wall(照片墙)模块的用户表
-2.根据1,一个Controller对应一张数据表
-3.所有Api操作都是RestController的一个子类。在 RestController::init中进行关闭视图，自动连接数据库操作。

-3.yaf不提供数据层。因此有了两种数据库操作方式。第一种使用lazy_php的数据库操作(简单sql语句),
第二种为ZendFrameWork的Zend_Db模块，数据验证，复杂动态sql。如(update,insert)等操作

-4.对于敏感操作，大批量更新，对非当前用户操作，数据删除等操作，需要使用密匙(目前仅仅使用了基于时间的一个有效期的加密demo)


-5.对数据实现json以及xml数据推送


