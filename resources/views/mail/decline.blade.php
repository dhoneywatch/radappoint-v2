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
                <p>Thank you for choosing RadAppoint! While we are eager to serve you, we regret to inform you that your
                    reservation for <b>{{ $data['modality'] }} - {{ $data['procedure'] }}</b> that is originally
                    scheduled on <b>{{ $data['date'] }}, {{ \Carbon\Carbon::parse($data['timeslot'])->format('h:i A') }}</b>.
                    The following are the possible reasons as to why your reservation was forfeited:
                </p>
                <ol>
                    <li>Payment was not processed in the given time frame.</li>
                    <li>Invalid proof of payment.</li>
                    <li>The procedure booked is different from what is requested by the physician.</li>
                </ol>
                <p>You may still book for another appointment and we look forward to providing you with an excellent service! Thank you.</p>
        </tr>
    </table>

</body>

</html>
