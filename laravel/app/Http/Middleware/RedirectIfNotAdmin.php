<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAdmin {

	/**
	 * Check if the user has the admin role, which grants them access to
   * the administration area of the site.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
   *
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
    if (!\Auth::check()) {
      return redirect('home');
    }

    if (!$request->user()->hasRole('admin')) {
      return redirect('home');
    }

		return $next($request);
	}

}
