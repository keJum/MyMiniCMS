FROM php:7
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring

RUN apt-get -y install sqlite3
WORKDIR /app
COPY . /app
RUN composer install
RUN php artisan key:generate
RUN mv .env.docker .env
RUN php artisan config:cache



CMD php artisan storage:link && php artisan serve --host=0.0.0.0 --port=8181
# CMD php artisan serve --host=0.0.0.0 --port=8181
# RUN composer update
EXPOSE 8181
# docker build -t my-first-image .
# docker run -p 8181:8181 my-first-image
# docker build -t [USERNAME]/my-first-image .
# docker login
# docker push [USERNAME]/my-first-image

#docker run [USERNAME]/my-first-image

#apt install sqlite3

# docker stop $(docker ps -a -q)