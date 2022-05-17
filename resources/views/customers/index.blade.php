<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers - Index</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            text-align: left;
        }
    </style>
</head>

<body>
    <h3>Customers!</h3>

    <a href="{{ route('customers.create') }}">Add customer</a>

    <p>
        @if(Session::has('customer') && Session::has('operation'))
            {{ Session::get('customer')->name }} has been {{ Session::get('operation') }}
        @endif
    </p>

    <table>
        <tr>
            <th>Name</th>
            <th>Birth Date</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ date('Y/m/d', strtotime($customer->birth)) }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email ?? '—' }}</td>
            <td>
                <a href="{{ route('customers.show', ['id' => $customer->id]) }}">Show</a>
                <a href="{{ route('customers.edit', ['id' => $customer->id]) }}">Edit</a>

                <form action="{{ route('customers.delete', ['id' => $customer->id]) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>
