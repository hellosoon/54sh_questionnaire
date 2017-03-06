<?php
/**
 * Created by Soon
 * www.so-on.cn
 * Date: 2016/11/13
 * Time: 0:07
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>后台管理</title>
    <link rel="icon" type="image/png" href="./assets/i/logo.png">
    <!-- Amaze UI CSS -->
    <link rel="stylesheet" href="//cdn.amazeui.org/amazeui/2.1.0/css/amazeui.min.css">
</head>
<body>
<div class="am-scrollable-horizontal">
    <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
        <tr>
            <th>序号</th>
			<th>时间</th>
			<th>反馈对象</th>
            <th>姓别</th>
            <th>反馈标题</th>
            <th>反馈内容</th>
            <th>联系电话</th>
        </tr>

        <?php
        $count_id = 1;
        foreach ($sqlLogRes as $tmp) {

			if($tmp['type'] == 1){
				$tmp['type'] = '测试';
			}
			$tmp['time'] = date('Y-m-d H:i:s',$tmp['time']);
			foreach ($tmp as $key => $value){
                    if($tmp[$key] == null){
                        $tmp[$key] = '无';
                    }
                    $tmp[$key] = $this->typography->nl2br_except_pre($tmp[$key]);
                }
            echo "
                <tr>
                <td>{$count_id}</td>
				 <td>{$tmp['time']}</td>
                <td>{$tmp['type']}</td>
                <td>{$tmp['suggestion_type']}</td>
                <td>{$tmp['title']}</td>
                <td>{$tmp['content']}</td>
                <td>{$tmp['phone']}</td>
                </tr>
                ";
            $count_id++;
        }
        ?>


    </table>
</div>
<!--[if lt IE 9]>
<script src="//libs.useso.com/js/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/js/polyfill/rem.min.js"></script>
<script src="//libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
<script src="//cdn.amazeui.org/amazeui/2.1.0/js/amazeui.legacy.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="//cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.amazeui.org/amazeui/2.1.0/js/amazeui.min.js"></script>
<!--<![endif]-->
</body>
</html>
