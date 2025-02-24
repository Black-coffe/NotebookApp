# Приложение для заметок на CodeIgniter 4.6.0

## Описание
Простое веб-приложение для создания и хранения заметок. Поддерживает добавление заголовка, содержимого и выбор важности (низкая, средняя, высокая). Заметки отображаются в виде аккордеона с фильтрацией по важности.

## Требования
- PHP 8.1+
- MySQL или MariaDB
- Локальный сервер (например, Laragon)

## Установка
1. Склонируйте или загрузите проект в папку вашего локального сервера.
2. Настройте файл `.env` с параметрами базы данных:
database.default.hostname = localhost
database.default.database = notebook_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi

3. Создайте базу данных `notebook_db` в MySQL.
4. Выполните миграцию: `php spark migrate`.

## Использование
- Откройте в браузере: `http://localhost`.
- Добавляйте заметки через форму.
- Фильтруйте заметки по важности кнопками "All", "Low", "Medium", "High".

## Автор
Black-coffe (https://github.com/Black-coffe)

## Лицензия
MIT
