
<extends:sendit:builder subject="Your OTP Code"/>
<use:bundle path="sendit:bundle"/>

<block:html>
    <p>Hi {{ $name }}!</p>
    <p>Your OTP code is: <strong>{{ $otp }}</strong></p>
    <p>This code is valid for 3 minutes.</p>
    <p>Best regards,<br>Spiral gRPC Team</p>
</block:html>

