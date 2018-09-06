# PHP_210 Booking Hotel

## Installation

For installing project use this

```
$ git clone https://github.com/mohsenRkia/php_210.git
$ composer install
$ php artisan key:generate
$ cp .env.example .env
```
## Before starting
```
First set your db name in .env file
```
```
$ php artisan migrate
```
For seeding database use this

```
$ php artisan db:seed --class=UsersTableSeeder
```

This will create a new admin and sample customer to sign in

```
Admin : 
Email : admin@admin.com
Password : 123456

Customer : 
Email : customer@customer.com
Password : 123456
```
By default user role is customer

## After that

In admin panel, create categories and posts to show up in site
