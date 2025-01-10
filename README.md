# Project Changelog

## Powered by:
- [Spiral Framework](https://spiral.dev)
- [Cycle ORM](https://cycle-orm.dev)
- [gRPC](https://grpc.io)

## Last update V2.2.5
**Framework:** Spiral Framework with gRPC

### Features

- **Register User:**
  - With user personal information
  - With user personal resident information
  - With user personal education information
  - With user personal job information
  - Receive a welcome email if email is added

- **Login User:**
  - With Email and OTP
  - With Email and password
  - With mobile and password
  - Receive a notification login email
  - JWT-based User Authentication

- **Docker Integration:**
  - Add Docker and manage by Docker

- **Admin Capabilities:**
  - Create categories
  - Assign access permissions
  - Create products with options for prices
  - Create products with attributes
  - Upload images via API
  - Update order status
  - Add discounts for every product
  - Update product comments to display

- **User Capabilities:**
  - Update profile via OTP
  - Create carts
  - See all carts
  - Delete cart IDs
  - Place an order
  - Cancel an order
  - View order status
  - Receive email notifications for order status changes
  - Add favorite products
  - Add comments for purchased products

- **Guest Capabilities:**
  - Create carts with their own UUID
  - See all carts with their own UUID
  - Delete cart IDs with their own UUID

- **Additional Enhancements:**
  - Added Seeder for Product Options
  - Added Queue-Notification
  - Added Search Products By Query Builder
  - Added Filter Products By Attributes
  - Added Similar Products
  - Added Media for Resident, Profile Picture, and Education
  - Added List Product to see all Prices
  - Added List Product Comments to see all Comments

### Fixes

- Resolved upload storage issues
- Resolved repetitive product-ID addition
- Fixed bugs in the Cart
- Fixed bugs in the User module
- Resolved text email issues for sending OTP
- Changed product values in migrations
