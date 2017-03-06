<?php
/**
 * Created by Soon
 */
define('BASEPATH', 'test');
//header('Content-type:text/json');



include_once('libs/config/config.php');//配置
include_once('libs/db/DB.class.php');//数据库类
include_once('libs/func/func.php');//公共函数
/*
 * 判断是不是ajax请求，其实这个可以伪造...
 */
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) or $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
   showErrorExit('');
}

//这里简单验证一下是不是机器刷的
$nowTime = time();
$id_key = md5($nowTime + rand(100000, 999999));
$ip = json_encode(getIp());
if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $agent = $_SERVER['HTTP_USER_AGENT'];
	if(strstr($agent,'sqlmap')){
		 showErrorExit('');
	}
} else {
    $agent = 'none';
}


$csutw_type = intval(get_GET('type'));
if ($csutw_type != 1 and $csutw_type != 2  and $csutw_type != 3) {
    showErrorExit('');
}
$typeSelect = get_POST('sex');
$title = get_POST('title');
$phone = get_POST('phone');
$content = get_POST('content');
if (empty($typeSelect) or empty($title) or empty($csutw_type)) {
    showErrorExit();
}


//数据库连接
$dbTmp = new DB();
$db = $dbTmp->init();

//预编译，绑定数据，插入，表名什么的都是伪造的，不公布服务器上面真实的了，逻辑就是这样子，不改也可以用
$sql = 'INSERT INTO `mytest_20170301` (`id_key`,`type`,`suggestion_type`,`title`,`phone`,`content`,`time`,`ip`,`agent`) VALUE (:id_key,:csutw_type,:typeSelect,:title,:phone,:content,:add_time,:ip,:agent)';
$suTmp = $db->prepare($sql);
$suTmp->bindValue(':id_key', $id_key);
$suTmp->bindValue(':csutw_type', $csutw_type);
$suTmp->bindValue(':typeSelect', $typeSelect);
$suTmp->bindValue(':title', $title);
$suTmp->bindValue(':phone', $phone);
$suTmp->bindValue(':content', $content);
$suTmp->bindValue(':add_time', $nowTime);
$suTmp->bindValue(':ip', $ip);
$suTmp->bindValue(':agent', $agent);
$result = $suTmp->execute();


if ($result) {
    $info = '成功啦！';
    $json = array(
        'status' => true,
        'info' => $info
    );
    echo(json_encode($json));
} else {
    showError('');
}

