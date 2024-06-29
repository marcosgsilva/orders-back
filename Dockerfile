FROM php:8-fpm

# Instalação das dependências do sistema e pacotes de desenvolvimento do PostgreSQL
RUN apt-get update && \
    apt-get install -y libpq-dev \
                       git \
                       curl \
                       libpng-dev \
                       libonig-dev \
                       libxml2-dev \
                       zip \
                       unzip

# Instalação de extensões PHP
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Instalação do Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define um usuário não privilegiado
ARG user
ARG uid



# Define o diretório de trabalho
WORKDIR /var/www/html

# Muda para o usuário não privilegiado
USER $user
