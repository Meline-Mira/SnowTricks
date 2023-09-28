# Emeline Numérique Blog

## Preparing the project for its first launch

Install Symfony and Doctrine.

## Launch the project locally

```
symfony serve
yarn encore dev --watch
```

## Compile CSS for production

```
yarn encore production
```

## Configure the mailer

Install Symfony Mailer. Copy the `.env` file to `.env.local` then fill the MAILER_DSN variable with a compatible DSN 
with Symfony Mailer.

## Configure the database connexion

Importe the database.sql file. The database engine I choose is MySQL (MariaDB). In `.env.local` fill in the variable 
values.
