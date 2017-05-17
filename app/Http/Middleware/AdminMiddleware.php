<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\MessageBag;

class AdminMiddleware
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
        /*if ($request->user()->role != 'admin')
        {
            return redirect('home');
        }

        return $next($request);*/
        $roles = [];
        $n = func_num_args();

        if ($n > 2) {
            $args = func_get_args();
            $roles = array_slice($args, 2);
        }

        if ($request->user()->hasRole($roles) || !$roles) {

            return $next($request);
        }

        return redirect('/')->with('errors', new MessageBag(['You are not authorized to access this resource.']));
    }
}
