<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;


class RefreshRedis
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_token=$_SERVER['HTTP_TOKEN'];
        $url=md5($_SERVER['REQUEST_URI']);
        $redis_key='str:count:token:'.$user_token.':url:'.$url;
        $redis_quantity=Redis::get($redis_key);
        if($redis_quantity>=5){

            echo '刷新过于频繁请一分钟后重试';
            Redis::expire($redis_key,10);
            die;
        }
        Redis::incr($redis_key);
        return $next($request);
    }
}
