<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Download {{ $user->firstname }}</title>
    <style>
        /* CSS styles for the PDF */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Appointment Details</h1>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Firstname</td>
            <td>{{ $appointment->firstname }}</td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td>{{ $appointment->lastname }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{ $appointment->address }}</td>
        </tr>
        <tr>
            <td>Maladie</td>
            <td>{{ $appointment->maladie }}</td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>{{ $appointment->date_of_birth }}</td>
        </tr>
        <tr>
            <td>CIN</td>
            <td>{{ $appointment->CIN }}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{ $appointment->gender }}</td>
        </tr>
        <tr>
            <td>Blood Type</td>
            <td>{{ $appointment->blood_type }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{ $appointment->status }}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>{{ $appointment->phone }}</td>
        </tr>
        <tr>
            <td>Appointment Date</td>
            <td>{{ $appointment->appointment_date }}</td>
        </tr>
        <tr>
            <td>Allergies</td>
            <td>{{ $appointment->allergies }}</td>
        </tr>
        <tr>
            <td>CNSS Number</td>
            <td>{{ $appointment->CNSS_Number }}</td>
        </tr>
    </table>

</body>
</html>