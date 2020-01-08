<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PubKey;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function ascii(){
        $data='user info';
        //xvhu#lqir
        $length=strlen($data);
//        echo $length;
        $pass='';
        for($i=0;$i<$length;$i++){
//            echo $data[$i].'=>>>>>>>'.ord($data[$i]);echo '<br/>';
            $ord=ord($data[$i])+3;
            $car=chr($ord);
//            echo $ord;echo '<br/>';echo $car;echo '<br>';
            echo $car;

        }
    }
    public function unascii(){
        $data='xvhu#lqir';
        $length=strlen($data);
//        echo $length;
        for($i=0;$i<$length;$i++){
//            echo $data[$i];
            $ord=ord($data[$i])-3;
            $chr=chr($ord);
            echo $chr;
//            echo $ord;echo '<br>';
        }


    }
    public function addsign(){
        return view('test.addsign');
    }
    public function verify(){
        $sign=request()->base;
        $data=request()->except('_token','base');
//        dump($data);
        ksort($data);
        $str='';
        foreach($data as $k=>$v){
            $str .=$k.'='.$v.'&';
        }
        $str=rtrim($str,'&');
//        echo $str;
        $id = Auth::user()->id;
        $pub_key=PubKey::where('p_id',$id)->value('pub_key');
        $int=openssl_verify($str,base64_decode($sign),$pub_key,OPENSSL_ALGO_SHA256);
        if($int){
            echo '验证成功';
        }else{
            echo '签名有误';
        }




    }
}
