<?php
/* ============================================================
 * @name:    ${NAME}
 * @author:  Misko Lee
 * @created: 13-7-26
 * @version: 0.11
 * @Copyright ${Time} ©pencilinside
 * ===========================================================*/
/** 发送HTTP状态
 *@param string|int $num HTTP协议状态报头号 */
function http_status($num) {
    static $http = array (
        100 => "HTTP/1.1 100 Continue",
        101 => "HTTP/1.1 101 Switching Protocols",
        200 => "HTTP/1.1 200 OK",
        201 => "HTTP/1.1 201 Created",
        202 => "HTTP/1.1 202 Accepted",
        203 => "HTTP/1.1 203 Non-Authoritative Information",
        204 => "HTTP/1.1 204 No Content",
        205 => "HTTP/1.1 205 Reset Content",
        206 => "HTTP/1.1 206 Partial Content",
        300 => "HTTP/1.1 300 Multiple Choices",
        301 => "HTTP/1.1 301 Moved Permanently",
        302 => "HTTP/1.1 302 Found",
        303 => "HTTP/1.1 303 See Other",
        304 => "HTTP/1.1 304 Not Modified",
        305 => "HTTP/1.1 305 Use Proxy",
        307 => "HTTP/1.1 307 Temporary Redirect",
        400 => "HTTP/1.1 400 Bad Request",
        401 => "HTTP/1.1 401 Unauthorized",
        402 => "HTTP/1.1 402 Payment Required",
        403 => "HTTP/1.1 403 Forbidden",
        404 => "HTTP/1.1 404 Not Found",
        405 => "HTTP/1.1 405 Method Not Allowed",
        406 => "HTTP/1.1 406 Not Acceptable",
        407 => "HTTP/1.1 407 Proxy Authentication Required",
        408 => "HTTP/1.1 408 Request Time-out",
        409 => "HTTP/1.1 409 Conflict",
        410 => "HTTP/1.1 410 Gone",
        411 => "HTTP/1.1 411 Length Required",
        412 => "HTTP/1.1 412 Precondition Failed",
        413 => "HTTP/1.1 413 Request Entity Too Large",
        414 => "HTTP/1.1 414 Request-URI Too Large",
        415 => "HTTP/1.1 415 Unsupported Media Type",
        416 => "HTTP/1.1 416 Requested range not satisfiable",
        417 => "HTTP/1.1 417 Expectation Failed",
        500 => "HTTP/1.1 500 Internal Server Error",
        501 => "HTTP/1.1 501 Not Implemented",
        502 => "HTTP/1.1 502 Bad Gateway",
        503 => "HTTP/1.1 503 Service Unavailable",
        504 => "HTTP/1.1 504 Gateway Time-out"
    );

    header($http[$num]);
}

function send_json_header(){
    header('Content-Type: application/json; charset=utf-8');
}

function send_xml_header(){
    header('Content-type: text/xml');
}

function send_text_header(){
    header('Content-Type: text/plain; charset=utf-8');
}

/** 渲染数据
 *@param array $data
 *@param string $format json or xml*/
function render_data($data,$format = 'json'){
    switch($format){
        case 'json':{
            send_json_header();
            return json_encode($data);}break;
        case 'xml':{
            send_xml_header();
            return array2xml($data);
        }break;

    }
}
/** 数组转xml
 *@param array $data
 *@param string $root 根节点名称
 *@return string */
function array2xml($data,$root ='xml-data'){

    $xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$root />");
    foreach($data as $key=>$value){
        if (is_numeric($key))
        {
            $key = "Node_". (string) $key;
        }

        if (is_array($value))
        {
            $node = $xml->addChild($key);
            render_data($value, 'xml-data', $node);
        }else{
            if($value ===null){
                $value="<![CDATA[NULL]]";
            }
            $xml->addChild($key,$value);
        }

    }
    return $xml->asXML();
}
/**
 *生成加密token
 * @reutrn string
 * */
function mcpty_token($time = ''){
    $t = $time;
    if(!$time){
        $t = time();
    }
    $time = (int)($t /1200);
    $time2 = (int)($time / 600);
    $md = substr(sha1($time),0,10);
    $md2 = substr(md5($time2),0,10);
    return $md.'.'.$md2;
}
/*** 验证加密密文**/
function valid_token($token){
    $token2 = mcpty_token($_SERVER['REQUEST_TIME']);
    return $token == $token2;
}

function config2zend($config=''){
    if($config == ''){
        $config = include APP_PATH.'/Conf/db.php';
    }
    $result = array(
        'host'=>$config['db_host'].':'.$config['db_port'],
        'username'=>$config['db_user'],
        'password'=>$config['db_password'],
        'dbname'=>$config['db_name']
    );

    return $result;
}

?>