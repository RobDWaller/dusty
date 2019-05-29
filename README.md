# Dusty: A WordPress Composer Starter Repo

Dusty is a WordPress started repo based around Composer and Docker. It allows you to create WordPress repos without the need to store core WordPress files in your Git repository. This makes for far easier deployments and cleaner code. It also allows you to load in non-WordPress libraries such as PHP Dot Env via Composer.

The library comes with a Docker configuration which will allow you to begin development immediately. The Docker development environment runs Apache, PHP 7.3 and MySQL 5.7.

## Setup (Linux / Mac)

Install using Composer:

```sh
composer create-project --no-dev --no-interaction rbdwllr/dusty project-name
```

Build Docker:

```sh
docker-compose build
docker-compose up -d
```

Create .env file with WordPress salts:

```sh
docker-compose exec web composer make-environment
```

## Setup on Windows / WSL

If you're running Docker on Windows you may experience problems if you're running Composer via WSL or GitBash.

Run the following commands:

```sh
composer create-project --no-interaction --no-install rbdwllr/dusty project-name

docker-compose build
docker-compose up -d

docker-compose exec web composer install --no-dev
docker-compose exec web composer make-environment
```

If you download the source files to your system just run the docker-compose commands.  

## Useful MySQL Commands

```sh
# Access MySQL Database.
docker-compose exec data mysql

# Install custom WordPress Database.
docker-compose exec data mysql wordpress < custom-wordpress-db.sql

# Dump the WordPress Database.
docker-compose exec data mysqldump wordpress > wordpress.sql

# Windows: Safely dump the WordPress Database.
docker-compose exec data mysqldump wordpress | Set-Content wordpress.sql
```
