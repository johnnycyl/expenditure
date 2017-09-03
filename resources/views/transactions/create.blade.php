@extends('layouts.app')

@section('content')
    <div class="container-fluid full-height">
        <div class="row full-height">

            @include('layouts.sidebar')

            <div class="col-md-7 mx-auto pt-3 full-height">

                <h1>New Transaction</h1>

                <form class="p-5 mx-auto my-5 border bg-white" method="POST" action="/transactions/store">
                    {{ csrf_field() }}
                    <fieldset class="form-group">
                        <label for="name">Transaction Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Transaction Name">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="price">Price ($AUD)</label>
                        <input type="number" min="0" step="0.01" class="form-control" id="price" name="price" placeholder="0.00">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="type">Transaction Type</label>
                        <select class="form-control h-50" name="type" id="type" >
                            <option value="" selected="selected">Select Transaction Type</option>
                            <option>Beuty</option>
                            <option>Electronics</option>
                            <option>Fashion</option>
                            <option>Food</option>
                            <option>Health</option>
                            <option>Home</option>
                            <option>Travel</option>
                            <option>Others</option>
                        </select>
                    </fieldset>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>

                    @include('layouts.errors')

                </form>
            </div>
        </div>
    </div>
@endsection
