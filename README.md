# FotosEngine3
Новая версия FotosCMS2! Теперь полностью работает как опенсорсная социальная сеть для креативных людей

New version of FotosCMS2! Now working as full opensource social network for creative people

# Локальная установка (local install)

- Создайте пустую БД (create empty database)
и импортируйте туда шаблон базы данных (users.sql, последнее обновление 12.04.2024)

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
  А также не забудьте выдать права на чтение/запись группе и пользователю www-data для этих папок
```bash
chown www-data:www-data users
chown www-data:www-data system/usercontent
```

- Настройте конфиг Apache2
  Чтобы работали файлы .htaccess в конфиг /etc/apache2/apache2.conf добавьте эту строку
```conf
AccessFileName .htaccess
```
  А также найдите блок <Directory /var/www/> и измените его таким образом:
```conf
<Directory /var/www/>
  Options Includes Indexes FollowSymLinks
  AllowOverride All
</Directory>
```

- Зарегестрируйте первого пользователя (register first user)
Перейдите на http://localhost/register.php (open with URL)
