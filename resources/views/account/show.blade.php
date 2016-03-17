<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Accounts</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                Mondo
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('oauth.destroy') }}">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>My Transactions</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 20px;"></th>
                        <th>Merchant</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Remaining</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td class="text-center">
                                {{ array_get($transaction, 'merchant.emoji') }}
                            </td>
                            <td>
                                {{ array_get($transaction, 'merchant.name', ucwords($transaction['category'])) }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse(array_get($transaction, 'created'))->format('d/m/Y \a\t h:i:s') }}
                            </td>
                            <td>
                                {{ \Edcs\Mondo\Support\Str::money(array_get($transaction, 'amount')) }}
                            </td>
                            <td>
                                {{ \Edcs\Mondo\Support\Str::money(array_get($transaction, 'account_balance')) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
