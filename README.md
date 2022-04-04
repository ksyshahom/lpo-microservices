# lpo-microservices
Как запустить проект?

Сначала собираем образы контейнеров (все команды запускаются из корня проекта):

`docker build ./php-auth -t php-auth`

`docker build ./php-base -t php-base`

`docker build ./nginx -t nginx`

`docker build ./mysql -t mysql`

Затем создаем сеть:

`docker network create lpo-net`

Собираем контейнеры:

`docker run -d --rm --net=lpo-net -p 9000:9000 --name=php-auth php-auth`

`docker run -d --rm --net=lpo-net -p 9001:9000 --name=php-base php-base`

`docker run -d --rm --net=lpo-net -p 80:80 -v D:/LPO/project/lpo/nginx/logs:/etc/nginx/logs --name=nginx nginx`

`docker run -d --net=lpo-net -p 3306:3306 -v D:/LPO/project/lpo/mysql/data:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=root-secret-pw --name=mysql mysql`

Можно запускать приложение в браузере: http://lpo-microservices.loc/
