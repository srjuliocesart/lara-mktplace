# Lara-mktplace
In a distant view this is going to be a CMS for marketplaces (I don't know how neither know why, it's just a excuse to study more of it).
This project has the primary intention to build a fundamental marketplace to later being inserted in into a Laravel with React application.

## The project
This project could be in theory launched in any machine just by starting the docker-compose (don't forget to set the proper
directory in the yml file, in this case I'm setting this project as lara-mktplace - feel free to name it as you want) with:
```
docker-compose-up
```
and then executing the migrations and seeding the tables to have something to work with it with the following commands:
```
docker-compose exec myapp php artisan migrate
docker-compose exec myapp php artisan db:seed
```

After doing this you'll probably have the rights to access the customer view to access the store view you need to modify
the column of the row in user called *role* to *ROLE_OWNER* , later this will have a third right access that will have the
option to control who is owner and who is just a customer.

By now it has all integrations active, so if you want to test some payments integration feel free to do it.