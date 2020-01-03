<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Model\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function reg(){
        $data=request()->post();
        $u=UserModel::where('name',$data['name'])->first();
        if($u){
                die('此用户名已存在');
        }
        if($data['password']!=$data['passwords']){
            die('密码与确认密码不一致');
        }
        //哈希加密
        $data['password']=password_hash($data['password'],PASSWORD_BCRYPT);
        //哈希解密
//        password_verify();
        $data['last_ip']=$_SERVER['REMOTE_ADDR'];
        $data['last_login']=time();
        unset($data['passwords']);
        $id=UserModel::insertGetId($data);
//        dd($id);
        $info=[
            'error'=>'0',
            'msg'=>'OK',
        ];
        echo json_encode($info);
    }
    public function login(){
        $data=request()->post();
        $u=UserModel::where('name',$data['name'])->first();
        if($u){
            if(password_verify($data['password'],$u['password'])){
                $token=Str::random(32);
                $info=['error'=>0,'msg'=>'OK','token'=>$token];
            }else{
                $info=['error'=>4002,'msg'=>'账号或密码有误'];
            }
        }else{
            $info=['error'=>4002,'msg'=>'账号或密码有误'];
        }
       return $info;
    }
    //进入页面
    public function index(){
//       dump($_SERVER);
//        $user_token=$_SERVER['HTTP_TOKEN'];
//        $url=md5($_SERVER['REQUEST_URI']);
//        $redis_key='str:count:token:'.$user_token.':url:'.$url;
//        $redis_quantity=Redis::get($redis_key);
//        if($redis_quantity>=5){
//
//            echo '刷新过于频繁请一分钟后重试';
//            Redis::expire($redis_key,10);
//            die;
//        }
//        Redis::incr($redis_key);

    }
}
