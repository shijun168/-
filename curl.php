<?php

//请求的url地址
$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx1eea0710b23e2d83&secret=f626b76ad090b5bea4bc98accbe76654';
// $json = json_encode(['id'=>1, 'name'=>'shijun' ],JSON_UNESCAPED_UNICODE);

//通过curl要上传到别的服务器上的图片地址 绝对地址
// $filepath = __DIR__.'/6.jpg';
//php5.6之后写成如下
// $data['pic'] = new CURLFile($filepath);
// $data['id'] = 100;

//初始化 相当于打开浏览器
$ch = curl_init();
//请求的URL地址设置
curl_setopt($ch, CURLOPT_URL, $url);
//设置输出的信息不直接输出
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//取消https证书验证
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//设置请求的超时时间 单是秒
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//模拟一个浏览器型号
curl_setopt($ch, CURLOPT_USERAGENT, 'MSIE');

// //正则筛选需要内容
// $preg = '/<h1>.*<\/h1>/';
// preg_match($preg, $data, $arr);

//告诉curl你使用了一个post请求
curl_setopt($ch, CURLOPT_POST, 1);
//如果json类型加一个头信息说明 //设置头信息
// curl_setopt($ch, CURLOPT_HTTPHEADER,[
//     'Content-Type:application/json;charset=utf-8'
// ]);
//post的数据
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

//执行请求操作
$data = curl_exec($ch);

// var_dump($data);
//得到请的错误码 0返回请求成功求， 大于0表示请求有异常
$errno = curl_errno($ch);
if(0 < $errno){
    //抛出自己的异常
    throw new Exception(curl_error($ch), 1000);
}
//关闭资源
curl_close($ch);
// var_dump($arr);
var_dump($data);



