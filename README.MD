# **Sistema de gestão de refrigerantes**

**Instalação:**

1. Clonar o projeto: git clone https://github.com/washingtonklebio/Drink.git

2. Entrar no diretório do projeto

3. Configurar o arquivo .env.example:
** 	DB_HOST=mysql-app
	DB_PORT=3306
	DB_DATABASE=drink
	DB_USERNAME=root
	DB_PASSWORD=1q2w3e4r  **

4. Rodar o comando **docker-compose up --build**

OBS: Casos as migrations e seeds não seja executada automaticamente, execute manualmente no container docke:

**docker exec -ti drink_app_1 bash**

Dentro da máquina execute:
**php artisan migrate**

**php artisan db:seed**