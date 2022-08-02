# We Movies
A cinema website,

## Setup
To get it working, follow these steps:

**Download Composer dependencies**

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```

You may alternatively need to run `php composer.phar install`, depending
on how you installed Composer.

First, make sure you have [Docker installed](https://docs.docker.com/get-docker/)
and running. To start the container, run:

```
docker-compose exec php composer install
docker-compose exec php yarn encore dev 
docker-compose up -d
```

**Run**

Now check out the site at `https://localhost:8000`