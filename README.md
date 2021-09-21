This is the scaffolding for a basic e-commerce website tracking users, orders, products, and inventory
# Setup

1. Install dependencies by running `composer install`  
2. Copy the `.env.example` file to `.env`
3. Generate an application key with `php artisan key:generate`
4. Set up your database credentials in `.env`
5. Create the schema for the application by running `php artisan migrate`
 - Optional: Import any existing data to the new schema