# WordPress Dusty

```
docker-compose up -d
docker-compose exec web composer install
docker-compose exec web composer make-environment


docker-compose exec data mysql
docker-compose exec data mysqldump wordpress | Set-Content wordpress.sql
docker-compose exec data mysqldump wordpress > wordpress.sql
```
