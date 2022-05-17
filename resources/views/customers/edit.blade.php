<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers - Create</title>
</head>

<body>
    <h3>Edit customer: {{ $customer->name }}</h3>

    <a href="{{ route('customers.index') }}">Index</a>

    <p></p>

    @if(Session::has('customer'))
        <p>{{ Session::get('customer')->name }} was edited on the list.</p>
    @endif

    <form action="{{ route('customers.update', ['id' => $customer->id]) }}" method="post">
        @csrf
        @method('PUT')

        <input required type="text" name="name" placeholder="Name" value="{{ old('name') ?? $customer->name }}">
        <input required type="date" name="birth" placeholder="Birth date" value="{{ old('birth') ?? $customer->birth }}">
        <input required type="text" name="phone" placeholder="Phone" value="{{ old('phone') ?? $customer->phone }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') ?? $customer->email }}">

        <button type="submit">Edit</button>
    </form>
</body>

</html>
