<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\PubKey;

class User extends Controller
{
    public function addpub(){
        $id = Auth::user()->id;
        $pubinfo=PubKey::where('p_id',$id)->first();
        if($pubinfo){
            echo '您的公钥为:'.$pubinfo['pub_key'];
            echo '<br>';
            echo "<a href='".url('/test/uppubkey/'.$id)."')>点击更换</a>";
        }else{
            return view('test/addpriv');
        }
    }
    public function creapub(){
            $id = Auth::user()->id;
            $data=request()->except('_token');
            $data['user_id']=$id;
            $id=PubKey::insertGetId($data);
            echo $id;
        return redirect('/home');




    }
    public function uppubkey($id){
        $pubinfo=PubKey::where('p_id',$id)->first();
//        return view('')
    }
    public function decode(){
        return view('test.decode');
    }
    public function decode_do(){
        $encode=base64_decode(request()->encode);
        $id = Auth::user()->id;
        $pub_key=PubKey::where('p_id',$id)->value('pub_key');
        openssl_public_decrypt($encode,$undata,$pub_key);
        echo $undata;
    }

}
