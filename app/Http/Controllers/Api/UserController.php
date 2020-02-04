<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function reg(){
        $data=$_POST;
        $url='http://passport.1905.com/user/reg';
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $info=curl_exec($ch);
        curl_close($ch);
        echo $info;
    }
    public function login(){
        $data=$_POST;
        $url='http://passport.1905.com/user/login';
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $info=curl_exec($ch);
        curl_close($ch);
        echo $info;
    }
    public function lists(){
        $data=$_POST;
        $url='http://passport.1905.com/user/getuserinfo';
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,['account'=>$data['account']]);
        curl_setopt($ch,CURLOPT_HTTPHEADER,[
            'token:'.$_SERVER['HTTP_TOKEN']
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $info=curl_exec($ch);
        curl_close($ch);
        var_dump($info);
    }
}
