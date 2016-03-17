<?php

namespace Edcs\MondoApp\Http\Controllers;

use Edcs\Mondo\Resources\Accounts;
use Edcs\Mondo\Resources\Transactions;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Returns an account overview page.
     *
     * @param Accounts $accounts
     * @param Transactions $transactions
     * @return View
     */
    public function show(Accounts $accounts, Transactions $transactions)
    {
        $account = $accounts->get()[0];

        $transactions = $transactions->get($account->getId());

        return view('account.show')->with(compact('transactions'));
    }
}
