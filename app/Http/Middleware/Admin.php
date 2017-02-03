<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;

use Closure;

class Admin
{
    protected  $auth;
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      
         if (count($this->auth->user())==0 || $this->auth->user()->deleted_at!=null || $this->auth->user()->privilegio==3) {
             Session::flash('message-error', 'Sin privilegios');
        return redirect()->to('/');
        }
        if ($this->auth->user()->estado==1){
        if ($this->auth->user()->privilegio == 1) {
            return $next($request);
        }
        if ($this->auth->user()->privilegio == 2) {
          return $next($request);
        }}
        else{
           Session::flash('message-error', 'Sin privilegios');
        return redirect()->to('/'); 
        }
       
    }
        
       
}
