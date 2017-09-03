@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-0 full-height">
        <div class="row min-height-100 full-height">
            @include('layouts.sidebar')
                <div class="row w-75 mx-auto">
                        <div class="col">
                            <h1>Overview</h1>
                            <div class="row">
                                @include('layouts/analytics')
                </div>
        </div>
    </div>
@endsection
