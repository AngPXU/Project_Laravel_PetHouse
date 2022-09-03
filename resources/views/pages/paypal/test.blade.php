<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pay $5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}"></script>
</head>
<body>
    <a class="btn btn-primary m-3" href="{{route('processTransaction')}}">Pay $5</a>
    @if(\Session::has('error'))
        <div class="alert alert-danger">{{\Session::get('error')}}</div>
        {{\Session::forget('error')}}
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">{{\Session::get('success')}}</div>
        {{\Session::forget('success')}}
    @endif
</body>
</html>