<?php namespace App\Http\Middleware;

use Closure;

class SlackAuthMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        $token = $request->get('token');
        if (env('SLACK_KEY') != $token) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }

}
