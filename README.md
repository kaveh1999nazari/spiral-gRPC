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
        <div class="version" id="v1-3">
            <h2>Last update V1.3</h2>
            <p><strong>Framework:</strong> Spiral Framework with gRPC</p>
            <ul class="features">
                <li>Register user with mobile and password</li>
                <li>Login with mobile and password</li>
                <li>JWT-based User Authentication</li>
                <li>Admin can:
                    <ul>
                        <li>Create categories</li>
                        <li>Assign access permissions</li>
                        <li>create products with prices and their options</li>
                        <li>Upload images base on api</li>
                    </ul>
                </li>
                <li>User can:
                    <ul>
                        <li>Create carts</li>
                        <li>See all carts</li>
                        <li>Delete cart ids</li>
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
            </ul>
            <p><strong>Fixes:</strong></p>
            <ul class="fixes">
                <li>Resolved upload storage issues</li>
            </ul>
        </div>
    </div>
</body>
</html>
