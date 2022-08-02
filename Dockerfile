FROM php:8.1.7-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y unzip nodejs npm yarn


# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime
RUN "date"

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www