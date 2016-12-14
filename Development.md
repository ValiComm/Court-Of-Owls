# Court Of Owls - Development

This repository is try to help developing Symfony's bundle easier with use of docker. Follow all the Pre-Usage steps prior to first docker build process.

This repository consist of
- docker/ - individual container configs and/or Dockerfile
- symfony/ - [hidden directory] core symfony app. Initialize on first docker run.
- your custom vendor package

Following these setup before running docker

1. [Docker Environment Variables](#docker-environment-variables)
2. [Docker Compose](#docker-compose)
3. [Dockerfile](#dockerfile-php-fpmsymfony)
4. [Composer Dependence](#composer-dependence)
5. [Mongo Setup](#mongo-setup-require-when-use-mongodb)

## Pre-Usage

### Docker Environment Variables
Create `.env` file before docker first run. Fill in the require fields.
```
cp .env.dist .env
```

### Docker Compose
Uncomment mysql or/and mongo blocks as bundle required.

### Dockerfile [php-fpm|symfony]
Uncomment mysql or/and mongo block in `docker/php-fpm/Dockerfile` and `docker/php-fpm/Dockerfile` as bundle required.

### Composer Dependence
Add composer dependence onto `docker/symfony/docker-entrypoint`.

ps: `GITHUB_ACCESS_TOKEN` is required in `.env` when using private composer package from github.

### Mongo Setup (Require when use mongodb)
Follow Symfony's [document](http://symfony.com/doc/current/bundles/DoctrineMongoDBBundle/index.html#installation) to config MongoDBBundle

## Usage

Build containers
```
docker-composer build
```

Run all container
```
docker-composer up
```

Run inside symfony container. Use symfony console or composer command
```
docker-composer run symfony bash
```

Close all container
```
docker-composer down
```

## Testing

```
docker-compose -f docker-compose.yml -f docker-compose.test.yml run phpunit
```

Code Coverage
```
docker-compose -f docker-compose.yml -f docker-compose.test.yml run phpunit phpunit --coverage-html /srv/coverage src/<VENDOR_NAME>/<BUNDLE_NAME>/Tests
```
