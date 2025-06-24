## Laravel AdminLTE v3
- Run with PHP 7.4 & Laravel 8
- With CRUD Generator https://github.com/awais-vteams/laravel-crud-generator
- Google Login API (Only setting GOOGLE ID & SECRET)
- Laravel Spatie
  
## Usage
This is not a package - it's a full Laravel project that you should use as a starter boilerplate, and then add your own custom functionality.

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed` (it has some seeded data - see below)
- That's it: launch the main URL and login with default credentials `admin@admin.com` - `password`
This boilerplate has one role (`administrator`), one permission (`users_manage`) and one administrator user.

With that user you can create more roles/permissions/users, and then use them in your code, by using functionality like `Gate` or `@can`, as in default Laravel, or with help of Spatie's package methods.

## Usage CRUD Generator
- php artisan make:crud {table_name}
- php artisan make:crud banks
  
### Add route in `web.php`
- Route::resource('banks', BankController::class);
  
## License

The [MIT license](http://opensource.org/licenses/MIT).
