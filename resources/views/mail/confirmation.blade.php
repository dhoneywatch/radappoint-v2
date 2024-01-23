<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RadAppoint</title>
</head>

<body>
    <table>
        <tr>
            <td>
                <h3>Hello, {{ $data['name'] }}!</h3>
            </td>
        </tr>
        <tr>
            <td>
                <p>Thank you for choosing RadAppoint! We're delighted to inform you
                    that your booking for <b>{{ $data['modality'] }} - {{ $data['procedure'] }}</b> is confirmed. The
                    procedure is scheduled on <b>{{ $data['date'] }},
                        {{ \Carbon\Carbon::parse($data['timeslot'])->format('h:i A') }}</b>.
                    Kindly take note of the following:
                </p>
                <ol>
                    <li>Kindly go to the reception table located at the 3rd Floor of the hospital.</li>
                    <li>Present the screenshot of this email. Please make the patient details below as visible as
                        possible.
                    </li>
                    <li>Kindly wait for the staff to assist you as you go on with your appointment.</li>
                </ol>
                <p>We look forward to providing you with an excellent service! Thank you for choosing RadAppoint.</p>
        </tr>
        <tr>
            <td>
                <h4>Appointment Details:</h4>
                <ul>
                    <li><b>Appointment ID:</b> {{ $data['id']}}</li>
                    <li><b>Patient Name:</b> {{ $data['name']}} {{ $data['last'] }}</li>
                    <li><b>Modality Code:</b> {{ $data['modality']}}</li>
                    <li><b>Procedure Code:</b> {{ $data['procedure_code']}}</li>
                    <li><b>Procedure Name:</b> {{ $data['procedure']}}</li>
                    <li><b>Schedule:</b> {{ $data['date']}}, {{ $data['timeslot']}}</li>
                </ul>
            </td>
        </tr>
    </table>

</body>

</html>
