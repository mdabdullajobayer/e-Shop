<?php

namespace App\Http\Middleware;

use App\Helpers\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        $result = JWTToken::ReadToken($token);
        if ($result == 'Unathorise') {
            return redirect('login');
        } else {
            $request->headers->set('email', $result->UserEmail);
            $request->headers->set('id', $result->userId);
            return $next($request);
        }
    }
}
