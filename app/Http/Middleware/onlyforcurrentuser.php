<?php

namespace App\Http\Middleware;

use Closure;
use App\order;
class onlyforcurrentuser
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
        if($request->user()->isAdmin()){
            return $next($request);
        }
        
        if($request->segment(3)){
            $order = order::find($request->segment(3));
            if($request->user()->id != $order->user_id){
                return redirect('/');
            }
            return $next($request);
        }else{
            return redirect('/');
        }
        
    }
}
