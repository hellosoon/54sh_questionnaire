<?php
/**
 * Created by Soon
 * www.so-on.cn
 * Date: 2016/11/13
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>后台管理登录</title>
    <link rel="icon" type="image/png" href="./assets/i/logo.png">
    <!-- Amaze UI CSS -->
    <link rel="stylesheet" href="//cdn.amazeui.org/amazeui/2.1.0/css/amazeui.min.css">
    <style>
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }
        .header p {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>后台管理</h1>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <h3>登录</h3>
        <hr>
        <form method="post" class="am-form">
            <label for="text">用户名:</label>
            <input type="text" name="acc" id="text" value="">
            <br>
            <label for="password">密码:</label>
            <input type="password" name="pass" id="password" value="">
            <br>
            <div class="am-cf">
                <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
            </div>
        </form>
        <hr>
    </div>
</div>
</body>
</html>
