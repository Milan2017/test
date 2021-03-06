<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClanakMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{
		if (Auth::guard($guard)->check() && Auth::id()!=$request->clanak['autor_id']) {
			//return redirect('/home');
			return redirect()->route('clanak.index')->with('error','Ne možete menjati ili brisati članak koji je kreirao drugi korisnik!');
		}
		
		return $next($request);
	}
}

