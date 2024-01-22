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
                <p>Thank you for choosing RadAppoint! We noticed the modifications that you made in your
                    appointment details. We received your booking for <b>{{ $data['modality'] }} -
                        {{ $data['procedure'] }}</b> that is scheduled on
                    <b>{{ $data['date'] }}, {{ \Carbon\Carbon::parse($data['timeslot'])->format('h:i A') }}</b>. To
                    secure your reservation, please proceed with the payment process outlined below:
                </p>
                <ol>
                    <li><b>Amount:</b> &#8369; {{ $data['price'] }}</li>
                    <li><b>Payment Method:</b> GCash / Maya</li>
                    <li><b>Send to:</b> 0928-909-7812, RadAppoint Systems</li>
                    <li><b>Next:</b> Save a copy or screenshot of your receipt, then upload it to the corresponding
                        appointment in your RadAppoint account.</li>
                    <li><b>Note:</b> Kindly accomplish the payment within 24 hours in order to
                        successfully reserve your booking. Otherwise, your reservation will be forfeited.</li>
                </ol>
                <p>We look forward to providing you with an excellent service! Thank you for choosing RadAppoint.</p>
        </tr>
    </table>

</body>

</html>
