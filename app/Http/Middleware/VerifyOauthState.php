<?php

namespace Edcs\MondoApp\Http\Middleware;

use Closure;
use Illuminate\Session\Store;

class VerifyOauthState
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
        if (!$this->session->has('oauth.state') && !$request->has('state')) {
            return $next($request);
        }

        if ($this->session->get('oauth.state') === $request->get('state')) {
            return $next($request);
        }

        $this->session->forget('oauth.token');
        $this->session->forget('oauth.state');

        return redirect(route('oauth.authorize'));
    }
}
