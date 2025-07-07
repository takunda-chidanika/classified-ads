# Use the official PHP 8.3 image with Apache
FROM php:8.3-apache

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files to the Apache document root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Set permissions (optional, adjust as needed)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"] 