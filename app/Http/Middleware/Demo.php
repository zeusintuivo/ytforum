<?php namespace YTForum\Http\Middleware;

use Closure;

class Demo {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//dd($request);
		return $next($request);
	}

}
