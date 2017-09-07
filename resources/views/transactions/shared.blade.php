<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shared Transactions</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-8 mx-auto">
                <h1 class="my-5">Shared Transactions</h1>
                <table class="table table-striped border bg-white">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Type</th>
                      <th>Shared By</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        @foreach ($shared as $transaction)
                            <td>
                                {{ $transaction->name }}
                            </td>
                            <td>
                                {{ $transaction->price }}
                            </td>
                            <td>
                                {{ $transaction->type }}
                            </td>
                            <td>
                                {{ $transaction->user->name }}
                            </td>
                        @endforeach
                    </tr>
                  </tbody>
                </table>

            </div>
        </div>

    </div>

 </body>
</html>
