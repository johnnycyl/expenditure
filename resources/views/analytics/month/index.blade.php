@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-0 full-height">
        <div class="row full-height">
            @include('layouts.sidebar')
            <div class="row w-75 mx-auto">
                <div class="col">
                    @if (request('month'))
                        <h1>{{ $month . ' ' . $year }}</h1>
                        <div class="row">
                            @include('layouts/analytics')
                    @else

                        <h1>Select Month</h1>
                        @if (count($archives))
                            @foreach ($archives as $stats)

                                <li>
                                    <a href="/analytics/month/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                                        {{ $stats['month'] . ' ' . $stats['year'] }}
                                    </a>
                                </li>

                            @endforeach
                        @else
                            <div class="col">
                                <div class="alert alert-info w-50 mx-auto text-center">
                                    <h1>No Transactions Yet!</h1>
                                    <button type="button" name="button" class="btn btn-primary" onclick="window.location.href='/transactions/create'">New Transaction</button>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
