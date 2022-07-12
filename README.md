<div align="center">
    <h1> My First Learning Project With: </h1>
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
    </a>
</div>

## About the project

This is blog I made with PHP Laravel by following a Laracasts tutorial series for the purpose of learning Laravel.

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone
composer install
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database blog
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```
