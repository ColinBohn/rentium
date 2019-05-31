# Rentium (Demo App)

## Running app with Docker
1. Install [Docker](https://www.docker.com/products/docker-desktop) on your machine
1. Clone this repo and `cd rentium`
1. Run `docker-compose up -d`
1. App should now be accessible at <http://localhost:8888>


## Running frontend in Dev environment
1. Install node on your machine
1. Clone this repo and `cd rentium/frontend`
1. Run `yarn install && yarn serve`
1. Frontend should now be accessible at <http://localhost:8080>

## Running backend in Dev environment
1. Install PHP and Composer on your machine
1. Clone this repo and `cd rentium/backend`
1. Run `composer install && php artisan serve`
1. Backend should now be accessible at <http://localhost:8000>

## Running backend tests
1. Install PHP and Composer, and PHPUnit on your machine
1. Clone this repo and `cd rentium/backend`
1. Run `composer install && phpunit`
1. Test results will print