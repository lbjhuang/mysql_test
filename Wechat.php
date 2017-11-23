<?php

class Wechat {
    /**
     * 消息类型常量
     */
    const MSG_TYPE_TEXT       = 'text';
    const MSG_TYPE_IMAGE      = 'image';
    const MSG_TYPE_VOICE      = 'voice';
    const MSG_TYPE_VIDEO      = 'video';
    const MSG_TYPE_SHORTVIDEO = 'shortvideo';
    const MSG_TYPE_LOCATION   = 'location';
    const MSG_TYPE_LINK       = 'link';
    const MSG_TYPE_MUSIC      = 'music';
    const MSG_TYPE_NEWS       = 'news';
    const MSG_TYPE_EVENT      = 'event';



    /**
     * * 响应微信发送的信息（自动回复）
     * @param  array  $content 回复信息，文本信息为string类型
     * @param  string $type    消息类型
     */

    public function text($content){
        var_dump($content);
    }
    public function response($content, $type = self::MSG_TYPE_TEXT){
        //header('Location:http://www.baidu.com');
        /* 按类型添加额外数据 */
        call_user_func(array(__CLASS__, $type), $content);
        //var_dump($content);
    }
}

$w = new Wechat();
$content = "蓝蓝的天空";
$w->response($content);

