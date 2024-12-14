FROM php:7.4-apache

WORKDIR /var/www/html

# Copy your PHP files to the /var/www/html directory
COPY . /var/www/html

# Install the desired Java Development Kit (JDK)
RUN apt-get update && apt-get install -y --no-install-recommends openjdk-17-jdk


RUN chown -R www-data:www-data /var/www/html

RUN chmod -R 755 /var/www/html 
# You may need to install additional PHP extensions or dependencies if required
# For example, if your PHP application uses MySQL, you might need to install the MySQL extension
# RUN docker-php-ext-install mysqli

# RUN echo "error_log = /var/log/php_errors.log" >> /usr/local/etc/php/php.ini


# Expose port 80 for HTTP
EXPOSE 80

# CMD to start Apache in the foreground
CMD ["apache2-foreground"]

