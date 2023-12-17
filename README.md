## Краткое описание и руководство к API

Минимальная авторизация на JWT <br>
База данных sqlite <br>
json файл API в корне проекта "friend_list.json" <br>
Параметры Postman "Variables" {{URL}} {{TOKEN}} <br>
Перед тем как начать, настройте файл .env (DB_DATABASE)

API
- /login (Авторизация пользователя, получаем Bearer Token)
- /registration (Регистрация по 'name', 'email', 'password')
- /logout (Раз логиниться)
- /friends (GET "index" лист друзей)
- /friends (POST "store" передаём в "user_id", 'id' пользователя которого хотите добавить в друзья)
- /friend/{id} (DELETE удаление друга из списка друзей по "id" пользователя)
- /friends (список твоих друзей)
- /possible/friends (Список "возможно знакомы" по принципу 5 рукопожатий)
