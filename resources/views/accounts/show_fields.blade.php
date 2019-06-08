<div id="exTab1">
    <ul class="nav nav-pills">
        <li class="active">
            <a href="#1a" data-toggle="tab">Account Details</a>
        </li>
        <li><a href="#2a" data-toggle="tab">Account Histories</a>
        </li>

    </ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
            <table>
                <thead>
                    <tr>
                        <th colspan="3">Account Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>User</td>
                        <td>
                            <a href="/users/{!! $account->user['id'] !!}">
                                {!! $account->user['name'] !!} | {!! $account->user['email'] !!}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Balance</td>
                        <td>
                            ${!! number_format($account->balance, 2) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Total Credit</td>
                        <td>
                            ${!! number_format($account->total_credit, 2) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Total Debit</td>
                        <td>
                            ${!! number_format($account->total_debit, 2) !!}
                        </td>
                    </tr>

                    <tr>
                        <td>Withdrawal Method</td>
                        <td>
                            {!! $account->withdrawal_method !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Payment Email</td>
                        <td>
                            {!! $account->payment_email !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Bank Name</td>
                        <td>
                            {!! $account->bank_name !!}
                        </td>
                    </tr>

                    <tr>
                        <td>Bank Branch</td>
                        <td>
                            {!! $account->bank_branch !!}
                        </td>
                    </tr>

                    <tr>
                        <td>Bank Account</td>
                        <td>
                            {!! $account->bank_account !!}
                        </td>
                    </tr>

                    <tr>
                        <td>Applied For Payout</td>
                        <td>
                            @if($account->applied_for_payout == 1)
                            Yes
                            @else
                            No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Paid</td>
                        <td>
                            @if($account->paid == 1)
                            Yes
                            @else
                            No
                            @endif
                        </td>
                    </tr>


                    <tr>
                        <td>Last Date Applied</td>
                        <td>
                            @if(!empty($account->last_date_applied))
                            {!! $account->last_date_applied->format('D d, M, Y h:i') !!}
                            @else
                            {!! $account->last_date_applied !!}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Last Date Paid</td>
                        <td>
                            @if(!empty($account->last_date_paid))
                            {!! $account->last_date_paid->format('D d, M, Y h:i') !!}
                            @else
                            {!! $account->last_date_paid !!}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Country</td>
                        <td>
                            {!! $account->country !!}
                        </td>
                    </tr>

                    <tr>
                        <td>Other Details</td>
                        <td>
                            {!! $account->other_details !!}
                        </td>
                    </tr>

                    <tr>
                        <td>Created </td>
                        <td>
                            {!! $account->created_at->format('D d, M, Y h:i') !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Last Updated </td>
                        <td>
                            {!! $account->updated_at->format('D d, M, Y h:i') !!}
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="2a">

            <h3 class="text-center "> Account History</h3>
            @include('account_histories.table')

        </div>

    </div>
</div>
