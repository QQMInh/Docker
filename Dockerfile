# Sử dụng image PHP chính thức với Apache
FROM php:8.2-apache

# Cài đặt các phần mở rộng PHP cần thiết cho MariaDB/MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Sao chép mã nguồn ứng dụng từ thư mục local vào container
COPY ./src /var/www/html

# Phân quyền cho thư mục ứng dụng để Apache có thể truy cập
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Bật module Apache rewrite (nếu cần thiết cho ứng dụng PHP)
RUN a2enmod rewrite

# Expose cổng 80 (Apache mặc định)
EXPOSE 80

# Khởi động Apache
CMD ["apache2-foreground"]
