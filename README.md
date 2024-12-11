## Requirements
- PHP
- Composer
- Docker
## Installation
```bash
docker compose up -d --build
docker compose exec app bash
chmod -R 777 /app/storage/ /app/bootstrap/
composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan jwt:secret
docker compose exec app php artisan migrate:fresh --seed
```
- .env 
```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```
## Contents
```text
laravel
mysql
jwt
```
- Usage
```text
request.json
```
