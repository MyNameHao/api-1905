<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Alipay extends Controller
{
    public function aliapi(){
        $url='https://openapi.alipaydev.com/gateway.do';
        $config=config('alipay');
        $timestamp = date('Y-m-d H:i:s');
        //参数
        $biz_content=[
            'out_trade_no'=>time().rand(1000,9999),
            'product_code'=>'FAST_INSTANT_TRADE_PAY',
            'total_amount'=>'0.01',
            'subject'=>'测试订单'.rand(1000,9999)
        ];
        //公共参数
        $alipay=[
            'app_id'=>'2016101400681561',
            'method'=>'alipay.trade.page.pay',
            'charset'=>$config['charset'],
            'sign_type'=>$config['sign_type'],
            'timestamp'=>$timestamp,
            'version'=>'1.0',
            'notify_url'=>'http://sh.lizhijun.fun/alipay/notify',
            'return_url'=>'http://sh.lizhijun.fun/alipay/return',
            'biz_content'=>json_encode($biz_content),
        ];

        //字典序排序
        ksort($alipay);
        $str='';
        foreach($alipay as $k=>$v){
            $str .=$k.'='.$v.'&';
        }
        $str=rtrim($str,'&');
//        dd($str);
        $key = storage_path('keys/app_priv');
        $priKey=file_get_contents($key);
        $res = openssl_get_privatekey($priKey);
        $sign='';
        openssl_sign($str, $sign, $res, OPENSSL_ALGO_SHA256);
        $sign=base64_encode($sign);
        $alipay['sign']=$sign;
        $param_str='?';
        foreach($alipay as $k=>$v){
            $param_str.=$k.'='.urlencode($v).'&';
        }
        $param_str=rtrim($param_str,'&');
        $url='https://openapi.alipaydev.com/gateway.do';
        $url=$url.$param_str;

        header('Location:'.$url);

    }
    //支付宝回调
    public function return_url(){
        print_r($_GET);
    }
    public function notify_url(){
        echo 'success';
    }

}
