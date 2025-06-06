
FROM php:8.1-apache

# Instala extensões necessárias
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copia os arquivos do projeto para o diretório do Apache
COPY . /var/www/html/

# Concede permissão de escrita à pasta uploads
RUN chmod -R 777 /var/www/html/uploads
