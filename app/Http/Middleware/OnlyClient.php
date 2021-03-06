<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use App\Helpers\Proxy\AuthProxy;
use Closure;
use Illuminate\Http\Request;
use LogicException;

class OnlyClient
{
    private AuthProxy $authProxy;

    public function __construct(AuthProxy $authProxy)
    {
        $this->authProxy = $authProxy;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($this->authProxy->check() && $this->authProxy->user()->role === Role::CLIENT) {
            return $next($request);
        }

        throw new LogicException("Don't have access");
    }
}
