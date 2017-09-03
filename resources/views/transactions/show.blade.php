@extends('layouts/app')

@section('content')
    <div class="container-fluid mt-0 full-height">
        <div class="row min-height-100 full-height">
            @include('layouts.sidebar')
            <div class="row w-75 mx-auto">
                <div class="col">
                    <h1>{{ $category }}</h1>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped border bg-white">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Price</th>
                                  <th>Type</th>
                                  <th>Date Added</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @php
                                      $i = 0;
                                  @endphp
                                  @foreach ($transactions as $transaction)
                                      @php
                                        $i++;
                                      @endphp
                                      <tr>
                                          <td>{{ $i }}</td>
                                          <td>{{ $transaction->name }}</td>
                                          <td>{{ $transaction->price }}</td>
                                          <td>{{ $transaction->type }}</td>
                                          <td>{{ $transaction->created_at->toFormattedDateString() }}</td>
                                      </tr>
                                  @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
