# Тестовое задание для Data Sfera

## О проекте
Приложение на Laravel, которое берет данные из тестового API и помещает их в базу данных.<br>
Всего создано 4 таблицы: incomes, orders, sales, stocks.

## Реализованный функционал
* Получение данных из API
* Вставка полученных данных в БД

## Технологический стек
* PHP 8.2
* Laravel 10
* Laravel Octane
* Laravel Sail
* MySQL

## Установка и запуск

Установка происходит с использованием Docker, Laravel Sail и Artisan.

### Клонирование репозитория

```shell
git clone https://github.com/flametong/data-sfera-test
```

### Установка зависимостей

```shell
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php82-composer:latest composer install --ignore-platform-reqs
```

### Настройка окружения

1. Создать файл .env в корневой папке
2. Cкопировать в .env все данные из .env.example
3. Поставить свои значение для базы данных в строки DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
4. Поставить секретный токен для авторизации SECRET_TOKEN="YOUR_VALUE"

### Создание APP_KEY в .env

```shell
php artisan key:generate
```

### Запуск приложения

```shell
./vendor/bin/sail up
```

### Открытие приложения

Перейти по ссылке http://localhost/

## Использование

У приложения есть Home страница, на которой есть ссылки: Get Incomes, Get Orders, Get Sales, Get Stocks. Также на странице есть примеры данных, полученных с БД, для наглядности. Эти ссылки совершают переход на страницы, которые должны вернуть ответ в виде {status: '', message: ''}. При переходе по каждой ссылке происходит взаимодействие с API и соответствующей таблицей в БД. После получения ответа можно переходить на главную страницу (Home) и данные должны появиться, если их нет. Если же ответа на странице нет, то тоже можно переходить на главную.

## Скриншоты приложения

<div align="center">
  <img src="https://github.com/flametong/data-sfera-test/assets/32167273/00a551f6-32c3-46bd-bea2-79cc9337c66d" alt="Home page">
</div>
