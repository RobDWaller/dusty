# Dusty: A WordPress Composer Starter Repo

Dusty is a WordPress started repo based around Composer and Docker. It allows you to create WordPress repos without the need to store core WordPress files in your Git repository. This makes for far easier deployments and cleaner code. It also allows you to load in non-WordPress libraries such as PHP Dot Env via Composer.

The library comes with a Docker configuration which will allow you to begin development immediately. The Docker development environment runs Apache, PHP 7.3 and MySQL 5.7.

## Setup

Install using Composer:

```sh
composer require rbdwllr/dusty project-name
```

Build Docker:

```sh
docker-compose build
docker-compose up -d
```

Install Composer dependencies:

```sh
docker-compose exec web composer install
docker-compose exec web composer make-environment
```

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
