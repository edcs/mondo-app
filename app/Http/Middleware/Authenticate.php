<?php

namespace Edcs\MondoApp\Http\Middleware;

use Closure;
use Illuminate\Session\Store;

class Authenticate
{
    /**
     * Instance of the session store.
     *
     * @var Store
     */
    private $session;

    /**
     * Verify oauth state constructor.
     *
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->session->has('oauth.token')) {
            return $next($request);
        }

        return redirect()->guest(route('oauth.authorise'));
    }
}
