<table>
    <tr><td>Welcome Mr.<b>{{$first_name.' '.$last_name}}</b></td></tr>
    <tr><td>Your Email Address: <b>{{$email_address}}</b></td></tr>
    <tr><td>Your Phone Number: <b>{{$phone_no}}</b></td></tr>
    <tr><td>Thank you for joining our community</td></tr>
    <tr><td>Please click  this link to active the account</td></tr>
    <tr><td><a href="{{route('checkout')}}">Active your account</a></td></tr>
    <tr><td>Regards,</td></tr>
    <tr><td>Eiser Team</td></tr>
</table>
