<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="header">
        <h1>Project Changelog</h1>
        <p>Powered by:</p>
        <ul>
            <li><a href="https://spiral.dev" target="_blank">Spiral Framework</a></li>
            <li><a href="https://cycle-orm.dev" target="_blank">Cycle ORM</a></li>
            <li><a href="https://grpc.io" target="_blank">gRPC</a></li>
        </ul>
    </div>
    <div class="changelog">
        <div class="version" id="v2.1.4">
            <h2>Last update V2.1.4</h2>
            <p><strong>Framework:</strong> Spiral Framework with gRPC</p>
            <ul class="features">
                <li>Register user:
                    <ul>
                        <li>with user personal information</li>
                        <li>with user personal resident information</li>
                        <li>with user personal education information</li>
                        <li>with user personal job information</li>
                        <li>Receive a welcome email if add email</li>
                    </ul>
                <li>Login user:
                    <ul>
                        <li>with Email and OTP</li>
                        <li>with Email and password</li>
                        <li>with mobile and password</li>
                        <li>Receive a notification login email</li>
                        <li>JWT-based User Authentication</li>
                    </ul>
                <li>Add docker and manage by docker</li>
                <li>Admin can:
                    <ul>
                        <li>Create categories</li>
                        <li>Assign access permissions</li>
                        <li>create products with options for prices </li>
                        <li>create products with attributes </li>
                        <li>Upload images base on api</li>
                        <li>Can update order status</li>
                    </ul>
                </li>
                <li>User can:
                    <ul>
                        <li>update the profile by OTP</li>
                        <li>Create carts</li>
                        <li>See all carts</li>
                        <li>Delete cart ids</li>
                        <li>Place an Order</li>
                        <li>Cancel an Order</li>
                        <li>Can see order status</li>
                        <li>Give email notification by changing order status</li>
                    </ul>
                </li>
                <li>Guest can:
                    <ul>
                        <li>Create carts with own UUID</li>
                        <li>See all carts with own UUID</li>
                        <li>Delete cart ids with own UUID</li>
                    </ul>
                </li>
                <li>Added Seeder for Product Options</li>
                <li>Added Queue-Notification</li>
                <li>Added Search Products By Query Build</li>
                <li>Added Filter Products By them Attributes</li>
                <li>Added Similar Products</li>
                <li>Added Media for Resident, Profile Picture, Education</li>
            </ul>
            <p><strong>Fixes:</strong></p>
            <ul class="fixes">
                <li>Resolved upload storage issues</li>
                <li>Resolved adding repetitive product-id</li>
                <li>Resolved some bugs in Cart</li>
                <li>Resolved some bugs in User</li>
                <li>Resolved text email of sending otp</li>
                <li>Changed values of products in migration</li>
            </ul>
        </div>
    </div>
</body>
</html>
