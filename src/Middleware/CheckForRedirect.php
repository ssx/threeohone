<?php namespace SSX\ThreeOhOne\Middleware;

use Closure;
use SSX\ThreeOhOne\Models\Redirect;
use Illuminate\Support\Facades\Redirect as RedirectFacade;

class CheckForRedirect {

    /**
     * Handle an incoming request, check to see if we have a redirect in place for the requested URL
     * and then redirect if we do have a match
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get the full URL that has been requested, minus the protocol
        $full_url = str_replace($request->getScheme()."://", "", $request->url());

        // Check for any results matching the full domain request
        $results = Redirect::where("type", "domain")
                            ->where("from", $full_url)
                            ->where("status", "active");

        if ($results->exists()) {
            // Get the first result back
            $redirect = $results->first();

            // Grab the URL before we increment
            $url = $redirect->to;

            // Increment the hit count
            $redirect->increment('hits');

            // Redirect off to where we're going
            return RedirectFacade::to($url);
        }

        // Check for any results matching the path only
        $results = Redirect::where("type", "path")
            ->where("from", "/".$request->path())
            ->where("status", "active");

        // If a redirect exists for this, process it and redirect
        if ($results->exists()) {
            // Get the first result back
            $redirect = $results->first();

            // Grab the URL before we increment
            $url = $redirect->to;

            // Increment the hit count
            $redirect->increment('hits');

            // Redirect off to where we're going
            return RedirectFacade::to($url, 301);
        }

        // By default, continue afterwards and bail out
        return $next($request);
    }

}
