<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Clanak;
class KategorijaMiddleware
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
		if (Auth::guard($guard)->check() && Auth::id()!=$request->kategorija['autor_id']) {
			//return redirect('/home');
			return redirect()->route('kategorija.index')->with('error','Ne možete menjati ili brisati kategoriju koju je kreirao drugi korisnik!');
		}
		if(! Clanak::where('kategorija_id', '=', $request->kategorija['id'])->get()->isEmpty() && $request->method()=='DELETE' ){
			return redirect()->route('kategorija.index')->with('error','Ne možete obrisati kategoriju u kojoj postoje članci!');
			
		}
		return $next($request);
	}
}
