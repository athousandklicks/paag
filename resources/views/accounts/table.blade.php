

<table class="table table-responsive" id="accounts-table">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Balance</th>
            <th>Total Credit</th>
            <th>Total Debit</th>
            <th>Applied For Payout</th>
            <th>Paid</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($accounts as $account)

        @if(!Auth::guest() && ($account->user_id == Auth::user()->id || Auth::user()->role_id < 3))

        <tr>
            <td><a href="{!! route('accounts.show', [$account->id]) !!}">
                    {!! $account->user['name']!!}
                </a>
            </td>
            <td>${!! number_format($account->balance, 2) !!}</td>
            <td>${!! number_format($account->total_credit, 2) !!}</td>
            <td>${!! number_format($account->total_debit, 2) !!}</td>
            <td>
                @if($account->applied_for_payout == 1)
                Payment Pending
                @else
                No
                @endif
            </td>
            <td>
                @if($account->paid == 1)
                Yes
                @else
                No
                @endif
            </td>
            <td>

                <div class='btn-group'>

                    <a href="{!! route('accounts.edit', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                </div>

            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

