<extends:sendit:builder subject="Order Status"/>
<use:bundle path="sendit:bundle"/>

<block:html>
    <h2>Hello, {{ $first_name }} {{ $last_name }}!</h2>
    <p>
        We are writing to inform you that the status of your order id (<strong>{{ $order_id }}</strong>) has been updated.
    </p>
    <p>
        Please find the latest details below:
    </p>
    <p>
        Status: <strong> {{ $order_status }} </strong>
    </p>
    <p>
        Order time: <strong> {{ $order_create }} </strong>
    </p>
    <p>
        Thank you for being with us! <br>
        The Spiral Shop Team
    </p>
</block:html>
