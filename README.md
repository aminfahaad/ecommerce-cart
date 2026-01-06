# Laravel 11 E-commerce Shopping Cart

## Tech Stack
- Laravel 11
- PHP 8.2
- Livewire
- Tailwind CSS
- Laravel Breeze
- Queues & Scheduler

## Features
- User authentication
- Product browsing
- User-based shopping cart
- Low stock email notification
- Daily sales report email
- Checkout & order creation

## Setup
```bash
git clone [https://github.com/aminfahaad/ecommerce-cart]
cd ecommerce-cart
cp .env.example .env
composer install
php artisan key:generate
npm install && npm run build
php artisan migrate --seed
php artisan queue:work
php artisan serve
