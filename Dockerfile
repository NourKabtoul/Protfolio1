# استخدام PHP 8.2 مع FPM
FROM php:8.2-fpm

# تثبيت الإضافات المطلوبة
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ضبط دليل العمل
WORKDIR /var/www/html

# نسخ جميع ملفات المشروع
COPY . .

# تثبيت اعتماديات PHP
RUN composer install --no-interaction --optimize-autoloader

# تثبيت وتشغيل Vite إذا كان موجوداً
RUN if [ -f "package.json" ]; then \
    npm install && \
    npm run build; \
    fi

# تعيين الصلاحيات المناسبة
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# كشف المنفذ
EXPOSE 8080

# تشغيل الخادم
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
