<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CheckPermissionRestrictions {
   public function handle(Request $request, Closure $next, $permission) {
        $user = auth()->user();
        if (!$user) {
            throw UnauthorizedException::notLoggedIn();
        }
        if ($user->hasRestrictedPermission($permission)) {
            throw UnauthorizedException::forPermissions([$permission]);
        }
        return $next($request);
    }
}


