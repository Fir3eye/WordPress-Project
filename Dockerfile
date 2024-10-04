# Use the official WordPress image from Docker Hub
FROM wordpress:latest

# Set environment variables for WordPress installation
ENV WORDPRESS_DB_HOST=db
ENV WORDPRESS_DB_USER=root
ENV WORDPRESS_DB_PASSWORD=example
ENV WORDPRESS_DB_NAME=wordpress_db

# Copy your custom theme into the container
COPY . /var/www/html/wp-content/themes/WordPress-Project

# Set the working directory
WORKDIR /var/www/html

# Ensure permissions are set correctly
RUN chown -R www-data:www-data /var/www/html/wp-content/themes/WordPress-Project

# Install any additional PHP extensions (optional)
RUN docker-php-ext-install mysqli

# Expose the port for the web server
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]