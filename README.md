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

## Setup (Windows / WSL)

If you're running Docker on Windows you may experience problems if you're running Composer via WSL or GitBash. This is because Docker on Windows does not like the symlinks Composer creates in the vendor folder.

To install Dusty on Windows / WSL run the following commands:

```sh
composer create-project --no-interaction --no-install rbdwllr/dusty project-name

# These commands will need to be run in PowerShell.
docker-compose build
docker-compose up -d

docker-compose exec web composer install --no-dev
docker-compose exec web composer make-environment
```

If you download the source files to your system just run the docker-compose commands.  

## Use Private Repos

Sometimes you'll wish to keep some of your code private but still pull it in via Composer. For instance you may have a WordPress theme that contains branded material and custom code.

You can do this by adding a Version Control System repository to your Composer config:

```js
"repositories":[
    {
        "type":"composer",
        "url":"https://wpackagist.org"
    },
    {
        "type": "vcs",
        "url":  "git@github.com:vendor/repo-name.git"
    }
],
```

### Repository SSH Keys

Usually if you are using a VCS repository, such as GitHub, it will be private and you will need to allow Composer to authenticate with the repository. The easiest way to do this is via SSH keys.

To give Docker access to these SSH keys you will need to copy them into the web container and amend the user privileges:

```sh
# Copy the your local id_rsa key into the root/.ssh folder of the web container.
docker cp ~/.ssh/id_rsa wordpress_web:/root/.ssh

# Amend the privileges of the web container .ssh folder.
docker-compose exec web chmod 600 -R /root/.ssh
```

Once this is done you can run composer install `docker-compose exec web composer install --no-dev`.

**Note:** The keys will be stored in a separate Docker volume so will persist even if you delete the container.

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

## Useful Resources

- [Chris Sherry's](https://twitter.com/tweetingsherry) talk on [WordPress and Composer at PHP UK](https://www.youtube.com/embed/v57UWTXla3M).

## Cat Tax

This is Dusty, AKA Princess Dustle-Puff, Ruler of All Things Soft and Scratchable, I named this repo after her. She is sat in my code chair, I think she's trying to help...

<img src="https://rbrt.wllr.info/assets/img/dusty-small.jpg" width="500">
