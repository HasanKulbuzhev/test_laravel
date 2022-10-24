<?php

namespace App\Http\Middleware;

use App\Enums\User\UserRole;
use Closure;

class SupportRoleMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->user()->hasRole(UserRole::SUPPORT)) {
            return response()->json('Вы не имеете нужны прав');
        }

        return $next($request);
    }
}
