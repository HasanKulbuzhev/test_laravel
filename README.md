# Это Тестовое задание для компании https://div-production.ru/
Для полноты картины файл с заданием находится тут [Тестовое Задание](test_tasks.txt)

методы тут [Файл для Insomnia](insomnia.json)

### Запускаем 
```
    docker-compose up -d 
    docker exec -it test_laravel_app
    composer install && \
    php artisan key:generate && \
    php artisan migrate && \
    php artisan passport:install \
    php artisan db:seed
```

Затем импортируем инсомниа файл, и проверяем. Тесты не сделал, было лень и поздно.

Касательно фильтров, то их делаем по типу ?filter["status"]=test

