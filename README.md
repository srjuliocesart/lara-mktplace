# lara-mktplace
This project has the intention to build a fundamental marketplace to later being inserted in into a Laravel with React application.

## The project
This project could be in theory launched in any machine just by starting the docker-compose with:
```
docker-compose-up
```

and then executing the migrations and seeding the tables to have something to work with it with the following commands:
```
docker-compose exec myapp php artisan migrate
docker-compose exec myapp php artisan db:seed
```
