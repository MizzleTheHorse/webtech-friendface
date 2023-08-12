# Friendface

Friendface is an application where registered users can post, while other registered users can interact with these posts by giving them a *like*.
## Setup

1. Clone your project locally.
2. Run `composer install` to install php dependencies.
3. Create a copy of the .env.example file named .env. You can done this with the command `cp .env.example .env`
4. Run `php artisan key:generate` to generate a random encryption key for your application
5. Run `php artisan serve` to boot up your application

### The database

The project requires a connection to a database. Luckily, thanks to docker, this is extremely simple and platform agnostic. To spin up a MySQL server, simply run the `docker-compose up -d` within the directory. This will pull a MySQL server, port-forward it to port 3306 on your machine, and start it in detached mode.

Additionally, we have included an installation of _phpmyadmin_ that you can use to explore the database (this will start as part of the docker command), simply go to [http://localhost:8036](http://localhost:8036)


The connection to the database is defined as follows:
- host: `localhost`
- port: `3306`
- username: `root`
- password: `secret`
- database: `adoption`


### Relevant commands


- `php artisan migrate` - This will synchronize your database structure to your migrations (read more [here](https://laravel.com/docs/8.x/migrations#introduction)), these can be viewed under `database/migrations`. Laravel comes bundled with some by default, which you can either ignore or delete.
- `php artisan migrate:fresh` - Deletes everything within your database and starts the migration from scratch, very useful during development.
- `php artisan migrate:fresh --seed` - Deletes everything within your database and starts the migration from scratch, and seeds the database with some dummy data.
- `php artisan serve` - Starts the development server for the application.

#### Running browser tests

You should run our browser tests using Laravel Dusk. The first time you run the tests on your machine, you will have to install the latest `Chrome` binaries; this can be done with the `php artisan dusk:chrome-driver` command (make sure you have the latest version of chrome).

In another terminal, run `php artisan serve` - this is needed as dusk actively uses the server to test your implementation. 

In your main terminal, run: `php artisan dusk` and `php artisan test` - this will start running your tests.

We also provided two controllers: Home and Post. The Home controller is in charge of the Home page (of course) and the authentication logic (sign in, sign up, etc). The Post controller is in charge of all the Post logic. 

### Route overview

The following routes are created for the pet shelter application:

| URL                 | Method | Controller     | Description                                                                  |
|---------------------|--------|----------------|------------------------------------------------------------------------------|
| /                   | GET    | HomeController | Shows the homepage                                                           |
| log-out             | GET    | HomeController | Logs the authenticated user out                                              |
| login               | POST   | HomeController | Logs the supplied user in if the credential matches                          |
| register            | GET    | HomeController | Shows the registration page where guests can sign up                         |
| register            | POST   | HomeController | Logic that creates the user from the input passed from the registration form |
| posts               | POST   | PostController | Creates a new post                                                           |
| posts/{post}        | DELETE | PostController | Deletes a given post                                                         |
| posts/{post}/like   | POST   | PostController | Likes a given post                                                           |
| post/{post}/dislike | POST   | PostController | Dislikes a given post                                                        |                            |


