<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAdmin
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if (!isset($user)) {
            return redirect('/');
        }

        if (!$user->isAdmin()) {
            return redirect('/notadmin');
        }

        return $next($request);
    }
}
