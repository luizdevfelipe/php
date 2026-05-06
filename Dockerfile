# Use a imagem base do PHP com o Apache
FROM php:8.1-apache

# Instala dependências necessárias e habilita a extensão mysqli (e pdo_mysql)
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       default-mysql-client \
       default-libmysqlclient-dev \
       libzip-dev \
       unzip \
       pkg-config \
       libssl-dev \
       build-essential \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Copia o conteúdo do diretório atual (incluindo subdiretórios) para o diretório de trabalho no container
COPY . /var/www/html/

# Ajusta permissões se necessário
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Habilita o módulo Apache Rewrite se necessário (opcional)
RUN a2enmod rewrite

# Exponha a porta 80 para acessar o servidor web
EXPOSE 80

# Inicia o Apache quando o container for iniciado
CMD ["apache2-foreground"]

