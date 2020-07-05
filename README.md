    composer install
    cp .env.example .env
    php artisan key:generate

##### для поднятия таблиц
    php artisan migrate
##### для заполнения таблицы админа
    php artisan db:seed --class=AdminTableSeeder
##### для заполнения таблицы мероприятий
    php artisan db:seed --class=EventTableSeeder
##### для выполнения тестов
    php artisan test

### API

##### Авторизация
    Запрос авторизации:
        POST http://<server>/api/login (login:admin, password:123)
        
##### Авторизация
    Запрос мероприятия
        GET http://<server>/event/{id}
    Запрос списка мероприятий
        GET http://<server>/event/list

##### Для следующий запросов обязателен auth-token который вернется после авторизации, егодобавлять в header
    Запрос получения пользователя:
            GET http://<server>/api/user/{id}
            
    Запрос получения списка пользователей:
            GET http://<server>/api/user/lsit
            Даныне: [eventId]
            
    Запрос создания пользователя:
            POST http://<server>/api/user/create
            Данные: [first_name, last_name, email]
            
    Запрос редактирования пользователя:
            POST http://<server>/api/user/edit/{id}
            Данные: [first_name, last_name, email]
            
    Запрос удаления пользователя:
            DELETE http://<server>/api/user/delete/{id}
            
    Запрос добавления пользователя в мероприятие:
            DELETE http://<server>/api/user/addToEvent/{id}
            Данные: [eventId]
            
    Запрос удаления пользователя из мероприятия:
            DELETE http://<server>/api/user/delFromEvent/{id}
            
