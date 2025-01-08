<?php

namespace Italofantone\RoleLadder\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Italofantone\RoleLadder\Services\RoleLadderService;

class RoleLadderMiddleware
{
    public function __construct(
        private RoleLadderService $roleLadderService
    ) { }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {        
        $user = $request->user();

        if (!$this->roleLadderService->compareRoles($user->role, $role)) {
            abort(Response::HTTP_FORBIDDEN);   
        }
        
        return $next($request);        
    }
}