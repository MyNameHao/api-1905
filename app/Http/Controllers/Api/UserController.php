<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;

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
    public function fangshua(){
//        dd($_SERVER);
        $redis_key=md5($_SERVER['HTTP_TOKEN'].$_SERVER['REQUEST_URI']);
        $time=10;
        Redis::incr($redis_key);
        $number=Redis::get($redis_key);
//        echo $redis_key;
        if($number>5){
            $times=Redis::ttl($redis_key);
            if($times==-1){
                Redis::expire($redis_key,$time);
                echo '超过次数限制,请'.$time.'秒后重试';
            }else{
                echo '超过次数限制,请'.$times.'秒后重试';
            }

        }else{
            echo '当前访问次数:'.$number;
        }

    }
    public function signature(){
        $_val='lello';
        $_key='1905qwe';
        $signature=md5($_val.'+'.$_key);
//        echo $signature;
        $url='http://passport.1905.com/test/verify?val='.$_val.'&signature='.$signature;
        echo file_get_contents($url);
    }
    public function postsign(){
        $key='abc123';
        $data=[
            'order_no'=>'123434123',
            'goods_name'=>'oppor17',
            'goods_munber'=>'3499',
            'user'=>'张三'
        ];
        $data_json=json_encode($data,JSON_UNESCAPED_UNICODE);
        $sign=md5($data_json.$key);
        $url='http://passport.1905.com/test/postsign';
        $client= new client();
        $res=$client->request('post',$url,[
            'form_params'=>[
                'data'=>$data_json,
                'sign'=>$sign
            ]
        ]);
        echo $res->getBody();

    }
    public function sslencr(){
        $path=storage_path('/key/priv.key');
        $data=[
            'order_no'=>'123434123',
            'goods_name'=>'oppor17',
            'goods_munber'=>'3499',
            'user'=>'张三'
        ];
        $data_json=json_encode($data,JSON_UNESCAPED_UNICODE);
        $pkeyid = openssl_pkey_get_private("file://".$path);
        openssl_sign($data_json, $signature, $pkeyid);
        $signature=base64_encode($signature);
        $url='http://passport.1905.com/test/sslencr?sign='.urlencode($signature).'&data='.$data_json;
         echo file_get_contents($url);
    }
    public function sslcbc(){
        $key='19020208';
        $data='hello word';
        $method='AES-256-CBC';
        $ivlen = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext = openssl_encrypt($data, $method, $key, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext, $key, $as_binary=true);
//        echo $hmac;echo '<br>';
        $ciphertext = base64_encode( $iv.$hmac.$ciphertext );
        $url='http://passport.1905.com/test/sslcbc?base='.urlencode($ciphertext);
        echo file_get_contents($url);
    }
    public function sslpriv(){
        //要加密的内容
        $data='你猜这是啥';
        //获取storage下面私钥的路径
        $path=storage_path('/key/priv.key');
        //根据$path的路径获取私钥的资源
        $priv=openssl_pkey_get_private('file://'.$path);
        //根据$priv的私钥进行对$data进行加密
        openssl_private_encrypt ($data,$crypted,$priv,OPENSSL_PKCS1_PADDING);
        //使用base64将加密后的数据进行转译
        $base_crypted=base64_encode($crypted);
        //将加密后得数据添加到网址中
        $url='http://passport.1905.com/test/sslpub?data='.urlencode($base_crypted);
        echo file_get_contents($url);


    }
}
