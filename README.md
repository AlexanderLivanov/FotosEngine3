# FotosEngine3
Новая версия FotosCMS2! Теперь полностью работает как опенсорсная социальная сеть для креативных людей
New version of FotosCMS2! Now working as full opensource social network for creative people

# Локальная установка (local install)

- Создайте пустую БД (create empty database)
и импортируйте туда шаблон базы данных (users.sql, последнее обновление 12.04.2024)
and import MySQL database template (users.sql, last update 12.04.2024)

- Создайте файл настроек для подключения к БД '/system/configs/creds.php' (create database connection settings file)
```php
<?php
$user = "root";
$passwd = "";
$db_name = "fotosworld";
```

- Создайте дефолтные директории пользователей (create users' directories)
```bash
mkdir users && mkdir system/usercontent
```

- Зарегестрируйте первого пользователя (register first user)
Перейдите на http://localhost/register.php (open with URL)
