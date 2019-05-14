<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# NumerikGames Laravel app

## Installation

1. Clone the repository
2. Run `cd /to/your/path`.
3. Run `composer install`.
4. Run `npm install`.
5. Create a `.env` file and use the `.env.example` to create it
6. Use `php artisan key:generate`
7. Launch your app

## Database
We hesitate to use a simple .sql file or the migration offer by Laravel, but when the client say we are not sure about the database and we certainly need to update him later, at this moment we choose the migration for more scalability.

For install the database, you need to create your database (with the name in your `.env` file).

1. Run `composer dump-autoload`.
2. Run `php artisan migrate:refresh --seed`.
   1. Only if the last command make an error.
   2. Run `php artisan migrate`.
   3. Run `php artisan db:seed`. 

## Contributors
- [Jarod STRECKEISEN](https://github.com/JarodStreck)
- [Anel MUMINOVIC](https://github.com/MuminovicAnel)
- [Nicolas HENRY](https://github.com/NicolasHenryCPNV)
  
## Clients
- Jerome Chevillat
- Marc Atallah

### Version
Current version : 0.4.0