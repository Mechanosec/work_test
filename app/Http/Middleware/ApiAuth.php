<?php


namespace App\Http\Middleware;


use Closure;

class ApiAuth
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
        $authToken = $request->header('auth-token');

        // Auth user
        if(!is_null($authToken)) {
            return $next($request);
        }

        if(is_null($authToken)) {
            throw new \Exception('Установите auth_token', 4011);
        }

        return $next($request);
    }
}
