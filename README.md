# Використанні технології
1. PHP 8.1
2. PostgerSQL
3. Laravel 10
   
# Основні можливості
1. Аутентифікація під ролями(адмін, тімлід, веб)
2. Отримання користувачів
3. Отримання статистики
   
# Розгортання проекту
1. Потрібно мати docker-compose
2. Клонуємо проект
3. Виконуємо команду
   ```bash
   docker-compose up --build -d
   ```
4. Створюємо файл .env з .env.example
5. Встановлюємо необхідні значення
6. Переходимо до docker контейнеру з php
   ```bash
   docker ps
   docker exec -it PHP_CONTAINER /bin/bash
   ```
7. Виконуємо встановлення необхідних пакетів
   ```bash
   composer i
   ```
8. Генеруємо app key
   ```bash
   php artisan key:generate
   ```
9. Виконуємо команду
   ```bash
   chmod 755 -R storage
   ```
10. Виконуємо міграції
    ```bash
    php artisan migrate
    ```
11. Виконаємо заповнення даними
    ```bash
    php artisan db:seed
    ```
