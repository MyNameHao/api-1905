<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Alipay extends Controller
{
    public function aliapi(){
        $config=config('alipay');
        $alipay=[
            'app_id'=>$config['app_id'],
            'method'=>'alipay.trade.page.pay',
            'format'=>'JSON',
            'return_url'=>'http://api.1905.com/return_url',
            'charset'=>$config['charset'],
            'sign_type'=>$config['sign_type'],
            'sign'
        ];
            dump($config);
            dd($alipay);
    }
    //支付宝回调
    public function return_url(){

    }
}
