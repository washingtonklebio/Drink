FROM wyveo/nginx-php-fpm:latest

WORKDIR /usr/share/nginx/

RUN rm -rf /usr/share/nginx/html

# Criando link simbólico de html para public
RUN ln -s public html

RUN apt-get update && apt-get install -y \
curl \
vim \
git \
cron \
unzip

# Instalando composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Instalando node.js
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - && \
    apt-get install -y nodejs

# Instalando NPM
RUN apt-get install -y npm

# Limpar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Adicionando arquivo de configuração do nginx no container
ADD ./nginx.conf /etc/nginx/conf.d/default.conf

# Configuração de logs para acessar através do docker logs, podemos usar o comando docker logs id_ou_apelido_do_container
RUN ln -sf /dev/stdout /var/log/nginx/access.log
RUN ln -sf /dev/stderr /var/log/nginx/error.log

COPY ./docker-entrypoint.sh /usr/bin
RUN chown -R 33:33 /usr/share/nginx
RUN chmod +x /usr/bin/docker-entrypoint.sh

ENTRYPOINT [ "/usr/bin/docker-entrypoint.sh" ]

# Porta que o container será acessível
EXPOSE 8080
