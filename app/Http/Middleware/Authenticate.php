<?php

   namespace App\Http\Middleware;

   use Closure;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Auth;

   class Authenticate
   {
       /**
        * Handle an incoming request.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \Closure  $next
        * @param  string|null  $guard
        * @return mixed
        */
       public function handle(Request $request, Closure $next, $guard = null)
       {
           if (!Auth::guard($guard)->check()) {
               return redirect('/login'); // Redirect to login if not authenticated
           }

           return $next($request);
       }
   }
   