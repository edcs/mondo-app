<?php

namespace Edcs\MondoApp\Http\Controllers;

use Edcs\OAuth2\Client\Provider\Mondo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class OauthController extends Controller
{
    /**
     * Instance of the mondo oauth client.
     *
     * @var Mondo
     */
    private $provider;

    /**
     * Instance of the session store.
     *
     * @var Store
     */
    private $session;

    /**
     * Oauth controller constructor.
     *
     * @param Mondo $provider
     * @param Store $session
     */
    public function __construct(Mondo $provider, Store $session)
    {
        $this->provider = $provider;
        $this->session = $session;
    }

    /**
     * Shows a view which allows the user to authenticate with mondo using oauth.
     *
     * @return View
     */
    public function authorize()
    {
        $url = $this->provider->getAuthorizationUrl();

        $this->session->flash('oauth.state', $this->provider->getState());

        return view('oauth.authorize')->with(compact('url'));
    }

    /**
     * The route the user gets redirected to after authenticating with mondo.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function callback(Request $request)
    {
        $token = $this->provider->getAccessToken('authorization_code', [
            'code' => $request->get('code')
        ]);

        $this->session->set('oauth.token', [
            'access_token'      => $token->getToken(),
            'expires'           => $token->getExpires(),
            'refresh_token'     => $token->getRefreshToken(),
            'resource_owner_id' => $token->getResourceOwnerId()
        ]);

        return redirect()->intended(route('account.show'));
    }

    /**
     * Logs the current user out of the application.
     *
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->session->flush();

        return redirect('/');
    }
}
