<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {   

        $roleUrls = [
            'admin' => 'admin',
            'agent' => 'agent',
            'user'  => '',
        ];

        $url = $roleUrls[$request->user()->role] ?? '';

        if ($request->user()->role !== $role) {
            return redirect($url.'/dashboard');
        }

        return $next($request);
    }
}
