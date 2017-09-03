@extends('layouts.app')

@section('content')

<div class="container pt-5 mt-5">
        <div class="jumbotron mt-5">
            <h1 class="display-3">Analyse your Spending</h1>
            <p class="lead mt-5">A simple tool that can help you understand your spending behaviour by analysing your spending. Our ultimate goal is to help you achieve financial freedom and cultivate good spending habits!</p>

            @guest
                <p><a class="btn btn-lg btn-success mt-5" href="{{ route('register') }}" role="button">Sign up today</a></p>
            @endguest

        </div>
</div>

@endsection
