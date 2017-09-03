@if ($transactionsCount == 0)
    <div class="col">
        <div class="alert alert-info w-50 mx-auto text-center">
            <h1>No Transactions Yet!</h1>
            <button type="button" name="button" class="btn btn-primary" onclick="window.location.href='/transactions/create'">New Transaction</button>
        </div>
    </div>
@else
    <div class="col">
        <h3>Transactions Breakdown</h3>
        <div class="border p-5 bg-white">
            @foreach ($typeBreakdown as $type)
                <span class="font-weight-bold">{{ $type->type }} > Spent > A$ {{ $type->total_spent }} </span>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ $type->percentage }}%" aria-valuenow="{{ $type->percentage }}" aria-valuemin="0" aria-valuemax="100"><span class="text-dark">{{ round($type->percentage,2) }}%</span></div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col">
        <h3>Findings</h3>
        <div class="border p-5 bg-white font-weight-bold">
            <p>Total Spent: A$ {{ $total }}</p>
            <p>Total Transactions: {{ $transactionsCount }}</p>
            <p>
                Top Transactions:
                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topThreeTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction->name }}</td>
                                <td>{{ $transaction->price }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->created_at->toFormattedDateString() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </p>
            <p>
                Top Transaction Types:
                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topThreeTransactionTypes as $transactionType)
                            <tr>
                                <td>{{ $transactionType->type }}</td>
                                <td>{{ $transactionType->count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </p>
        </div>
    </div>
</div>
</div>

@endif
