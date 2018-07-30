## Development

### Services

```
docker-compose up --build
```

### Dependencies

```
cd api/app && composer install
```

### Env

```
cp .env.example .env && \
  echo 'MAILCHIMP_KEY=[key]' >> .env && \
  echo 'JWT_SECRET=[secret]' >> .env
```

### Database

```
cp .empty.sqlite database.sqlite && \
  docker exec -it api php artisan migrate && \
  docker exec -it api php artisan db:seed
```

## Tests

```
cd api/app && ./vendor/bin/phpunit
```

## Usage

The following headers should be present when testing the API.

```
X-Requested-With: XMLHttpRequest
Authorization: Bearer [base64]
```

A JWT can be generated in the debugger at https://jwt.io/ using the same secret as `JWT_SECRET` and setting the user id `"sub": "1"`.

### Routes

```
docker exec -it api php artisan route:list
```
