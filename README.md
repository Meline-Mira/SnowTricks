# SnowTricks

## Installing dependencies

```
composer install
```

## Launch the project locally

In two different terminals, run:

```
symfony serve
yarn encore dev --watch
```

## Compile CSS for production

```
yarn encore production
```

## Configure the mailer

Create a `.env.local` file containing a MAILER_DSN according to Symfony Mailer's specifications.

## Configure the database connection

In `.env.local`, fill the DATABASE_URL variable depending on the database engine you want to use. In your terminal, type :

```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```
