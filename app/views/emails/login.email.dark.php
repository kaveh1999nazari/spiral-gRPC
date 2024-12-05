<extends:sendit:builder subject="Login Notification"/>
<use:bundle path="sendit:bundle"/>

<block:html>
    <h1>Hello, {{ $first_name }} {{ $last_name }}!</h1>
    <p>
        We noticed that you just logged into your account at <strong>{{ $login_time }}</strong>.
    </p>
    <p>
        If this was you, there's nothing to worry about! Feel free to continue exploring our platform.
    </p>
    <p>
        If you didn't log in, please secure your account immediately by resetting your password or contacting our support team.
    </p>
    <p>
        Thank you for being with us! <br>
        The Spiral Shop Team
    </p>
</block:html>
