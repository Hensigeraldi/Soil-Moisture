FROM php:7.4-apache

# Install ekstensi mysqli
RUN docker-php-ext-install mysqli

# Salin semua file PHP ke dalam container
COPY . /var/www/html/

EXPOSE 80
