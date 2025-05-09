<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(auth::check()))
        {
          if(Auth::user()->user_type=='organizer')
          {

              return $next($request);
          }
          else
          {
            auth::logout();
            return redirect(url(''));
          }

        }
        else
        {
            auth::logout();
            return redirect(url(''));
        }
    }
}
