<?php
/**
 * Created by Soon
 * www.so-on.cn
 * Date: 2017/1/7
 * Time: 1:42
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
function get_POST($str = '')
{
    if (!isset($_POST[$str])) {
        return null;
    }
    return trim($_POST[$str]);
}
function get_GET($str = '')
{
    if (!isset($_GET[$str])) {
        return null;
    }
    return trim($_GET[$str]);
}

/*
 * 获取用户IP的函数
 */
function getIp()
{
    $onlineip = "";
    $onlineip_type = "";
    if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $onlineip = getenv('HTTP_CLIENT_IP');
        $onlineip_type = 'HTTP_CLIENT_IP';
    } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $onlineip = getenv('HTTP_X_FORWARDED_FOR');
        $onlineip_type = 'HTTP_X_FORWARDED_FOR';
    } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $onlineip = getenv('REMOTE_ADDR');
        $onlineip_type = 'REMOTE_ADDR';
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $onlineip = $_SERVER['REMOTE_ADDR'];
        $onlineip_type = 'REMOTE_ADDR';
    }
    return array(
        'ip' => checkIP($onlineip),
        'type' => $onlineip_type
    );
}

function checkIP($ip = '')
{
    if (empty($ip)) {
        return $ip;
    }
    $p_ip = '/^(\d|\.)+$/';
    if (preg_match($p_ip, $ip, $m) < 1) {
        $ip = base64_encode($ip);
    };
    return $ip;
}

function showError($info = '')
{
    $info = empty($info) ? '出错啦！' : $info;
    $json = array(
        'status' => false,
        'info' => $info
    );
    echo(json_encode($json));
}

function showErrorExit($info = '')
{
    $info = empty($info) ? '出错啦！' : $info;
    $json = array(
        'status' => false,
        'info' => $info
    );
    exit(json_encode($json));
}
