<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changelog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        .changelog {
            max-width: 800px;
            margin: 0 auto;
        }
        .version {
            margin-bottom: 20px;
        }
        .version h2 {
            background-color: #f4f4f4;
            padding: 10px;
            border-left: 5px solid #007bff;
        }
        .features, .fixes {
            padding-left: 20px;
        }
        .features li, .fixes li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="changelog">
        <div class="version" id="v1-2-1">
            <h2>v1.2.1</h2>
            <p><strong>Framework:</strong> Spiral Framework with gRPC</p>
            <ul class="features">
                <li>Register user with mobile and password</li>
                <li>Login with mobile and password</li>
                <li>JWT-based User Authentication</li>
                <li>Admin can:
                    <ul>
                        <li>Create categories</li>
                        <li>Assign access permissions</li>
                        <li>Create products</li>
                        <li>Upload images (Base64 or binary)</li>
                    </ul>
                </li>
                <li>Added Seeder for Product Options</li>
            </ul>
            <p><strong>Fixes:</strong></p>
            <ul class="fixes">
                <li>Resolved upload storage issues</li>
            </ul>
        </div>
        <div class="version" id="v1-2">
            <h2>v1.2</h2>
            <p><strong>Framework:</strong> Spiral Framework with gRPC</p>
            <ul class="features">
                <li>Register user with mobile and password</li>
                <li>Login with mobile and password</li>
                <li>JWT-based User Authentication</li>
                <li>Admin can:
                    <ul>
                        <li>Create categories</li>
                        <li>Assign access permissions</li>
                        <li>Create products</li>
                        <li>Upload images (Base64 or binary)</li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Add other versions dynamically -->
    </div>
</body>
</html>


Alternatively, you can create an issue on GitHub to report a bug or request a feature:

[Create an Issue on GitHub](https://github.com/spiral/framework/issues/new/choose)

We welcome any feedback or suggestions you may have, and are always happy to help troubleshoot any issues you may
encounter.
