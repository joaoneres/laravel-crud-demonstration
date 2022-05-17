<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers - Create</title>
</head>

<body>
    <h3>Create customer!</h3>

    <a href="{{ route('customers.index') }}">Index</a>

    <p></p>

    @if(Session::has('customer'))
        <p>{{ Session::get('customer')->name }} was added to the list.</p>
    @endif

    <form action="{{ route('customers.store') }}" method="post">
        @csrf

        <input required type="text" name="name" placeholder="Name">
        <input required type="date" name="birth" placeholder="Birth date">
        <input required type="text" name="phone" placeholder="Phone">
        <input type="email" name="email" placeholder="Email">

        <button type="submit">Add</button>
    </form>
</body>

</html>
