# Shopping List - API

This project was my first API made with Laravel and Docker. It was done, during my sixth semester of studying at the Witelon State Univeristy of Applied Sciences in Legnica, to pass a course called "Intermediate Methods of Programming"

This API allows us to manage a shopping list, products and categories of products. One can add, edit and delete any of the three mentioned earlier. There were plans to implement sharing the shopping lists but due to the lack of time, I've never finished that part of the project. Maybe one day I'll finish it properly.

There are also three projects that use my API:
- [Web](https://github.com/shopping-list-zmp/Web) - made in Vue by [Patryk Zym](https://github.com/rewe999)
- [Desktop](https://github.com/shopping-list-zmp/Desktop) - made in Electron and Angular by [Andrzej Lech](https://github.com/AndrzejLech)
- [Mobile for iOS](https://github.com/shopping-list-zmp/iOS) - made in Swift by [Mateusz Leśniara](https://github.com/Overnerfed)

## Installation
### 1. Create `.env` file based on `.env.example`:
Linux:
```shell script
cp .env.example .env
```
Windows:
```shell script
copy .env.example .env
```
### 2. Run containers:
```shell script
docker-compose up -d
```

### 3. Enter the container:
```shell script
docker exec -it api_app_1 /bin/bash
```

### 4. Fetch dependencies:
```shell script
composer install
```

### 5. Generate application key:
```shell script
 php artisan key:generate
```

### 6. Run migrations:
```shell script
 php artisan migrate
```

### 7. Generate JWT key:
```shell script
 php artisan jwt:secret
```

### 8. Generate API docs:
```shell script
 php artisan l5-swagger:generate
```

### 9. All done! You can access API docs here:

 http://localhost:8080/api/docs


## Author:
- [Mikołaj Gawroński](https://github.com/mikolajgawronski)
