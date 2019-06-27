FROM devilbox/php-fpm:7.2-work
#COPY . /code
#WORKDIR "/code"
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && ln -s $(composer config --global home) /root/composer
ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1
#RUN composer install
#RUN php artisan key:generate
#RUN php artisan migrate
#RUN php artisan db:seed