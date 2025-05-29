# Use uma imagem base leve com PHP e outras dependências
FROM php:8.2-fpm-alpine
FROM mcr.microsoft.com/powershell:latest
FROM composer:latest

# Criar o diretório do projeto e copiar os arquivos
WORKDIR /var/www/burgopaulista.com/web
COPY . ./
#RUN powershell -Command "'$Env:ProgramFiles\dotnet\dotnet' tool restore" -g && \
#    Invoke-WebRequest https://getcomposer.org/installer -OutFile composer-setup.php && \
#    php composer-setup.php --install-dir="php" --filename="composer" && \
#    php -r "file_get_contents('https://getcomposer.org/version');" && \
#    php composer.phar self-update

# RUN php composer.phar self-update
RUN composer install
# Expor a porta 8088
EXPOSE 80

# Comando para iniciar o servidor de desenvolvimento
CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]
