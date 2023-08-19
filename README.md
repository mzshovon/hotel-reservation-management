
# Hotel Management & Reservation

A laravel 9.0 based management and automation project on managing hotels and inventory products.

# Project Installation

- pull from repo
- Run docker build for creating virtual container in your machine (For all changes add --no-cache).
```bash
  docker-compose build
```

- Run docker up for start the container
```bash
  docker-compose up (For debugging & logging)
  docker-compose up -d (For one time start)
```
- Get access to bash to install dependencies
```bash
  docker exec -it hms_php_fpm bash
  composer install
  composer du
  php artisan key:generate
  php artisan optimize
  php artisan route:clear
```
- Get access to redis-cli
```bash
  docker exec -it hms_redis redis-cli -p <port>
  PING
  GET KEYS
```
#### If you find any permission related issue from your storage(mostly in linux), Do the following steps and then browse the project with port 9090

```bash
  sudo chmod 0777 -R storage/
```

## Authors

- [@mzshovon](https://www.github.com/mzshovon)
