## Installation Steps

1. Clone the repository.
2. Create a MySQL database with your favorite name ex:"laravel".
3. Run the following commands:

```
composer install
```

```
cat .env.example > .env
```

```
php artisan key:generate
```

4. Customize the vars in the `.env` file with your database info.
5. Run migration and seed:

```
php artisan migrate --seed
```

6. Install npm packages and build assets:

```
npm install && npm run build

```

7. Start the application:

```
php artisan serve
```

and open this URL in your browser `127.0.0.1:8000`

## Development

For development, you can run:

```
npm run dev
```
