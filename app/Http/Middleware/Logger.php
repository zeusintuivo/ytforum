<?php namespace  YTForum\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Logger {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}


	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		$results = DB::select('select * from users where id = ?', [1]);

		if ($request->has('host')) {
			dd($request);
		}
		//$headers = new $request->headers();
		$headers = $request->headers;
		//$headers_a = $request->headers->toArray();

		if (\Auth::check()) {
			$app =  app();
			//echo "$app";
			//dd($app);
			dd($request->headers);
			dd($request);
					
		}

		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{

				//return response('Unauthorized.', 401);
			}
			else
			{
				if ($headers->has('user-agent')) {
					$userAgent = $headers->get('user-agent');
					dd($userAgent);
				}
				if ($headers->has('host')) {
					$host = $headers->get('host');
					dd($host);
				}
				dd($headers);
				dd($request->headers);
				dd($request);
				//return redirect()->guest('auth/login');
				//return redirect()->guest('/');
			}
		}

		return $next($request);
	}

}
