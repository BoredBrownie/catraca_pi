FROM php:8.1-apache

# Instala extensão mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Cria a pasta uploads e define permissão
RUN mkdir -p /var/www/html/uploads && chmod -R 777 /var/www/html/uploads

# Copia os arquivos do projeto para o Apache
COPY . /var/www/html/
