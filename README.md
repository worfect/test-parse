Парсер XML-выгрузки:
1. добавляет в базу записи, которых в ней еще нет;
2. обновляет записи, которые пришли в XML и уже есть в базе;
3. удаляет из базы записи, которых нет в XML;

---

Запуск из корня приложения:
```bash
php artisan parser:xml
```
или при использовании контейнеров в комплекте:
```bash
docker-compose up --build -d
docker-compose run --rm cli php artisan migrate:refresh
docker-compose run --rm cli php artisan parser:xml
```
---

Файл выгрузки по умолчанию - data_light.xml в корне приложения.

Подробнее:
```bash
php artisan parser:xml --help
```
