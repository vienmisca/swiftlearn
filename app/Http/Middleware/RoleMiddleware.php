<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Usage: Add roles as argument separated by | e.g. 'siswa|mentor|admin'
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $user = Auth::user();
        if (!$user) {
            // Not logged in
            return redirect('/login');  // or customize the login route
        }
        $roleArray = explode('|', $roles);
        if (!in_array($user->role, $roleArray)) {
            // Role not authorized
            abort(403, "Unauthorized access.");
        }
        return $next($request);
    }
}