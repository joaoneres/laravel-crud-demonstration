<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers - Show</title>

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
    <h3>Customer: {{ $customer->name }}!</h3>

    <a href="{{ route('customers.index') }}">Index</a>

    <p></p>

    <table>
        <tr>
            <th>Name</th>
            <th>Birth Date</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ date('Y/m/d', strtotime($customer->birth)) }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email ?? '—' }}</td>
        </tr>
    </table>
</body>

</html>
