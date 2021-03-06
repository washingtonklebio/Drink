# **SPA - Sistema de gestão de refrigerantes**

### Tecnologias: Vue.js, Vuex, Vue router, Vuetify, Vue toasted, Gravatar, Laravel 5.8.

**Instalação:**

1. Clonar o projeto: git clone https://github.com/washingtonklebio/Drink.git

2. Entrar no diretório do projeto.

3. Configurar o arquivo **.env.example** renomear para **.env** e editar os seguintes campos:


	DB_HOST=mysql-app

	DB_PORT=3306

	DB_DATABASE=drink

	DB_USERNAME=root

	DB_PASSWORD=1q2w3e4r

 4. Rodar o comando ```docker-compose up --build``` na pasta raiz do projeto.

 5. Caso as migrations e seeds não seja executada automaticamente, execute manualmente no container docker:

	 ```docker exec -ti drink_app_1 bash```

	 Dentro da máquina execute:

	 ```php artisan migrate```

	 ```php artisan db:seed```


	 O **passo 5** só precisa ser feito caso o arquivo ```docker-entrypoint.sh``` por algum motivo não consiga executar  **automaticamente** esses comandos. Para saber se foi executado é possível acompanhar o log após executar o **passo 4**.
	 
	 O projeto será executado localmente na porta 8080: **localhost:8080**
	 
	 Portas usadas da máquina local: **8080, 3377** caso alguma dessas portas esteja sendo usada, basta adicionar outras portas no arquivo **docker-compose.yaml** e **Dockerfile**.

![Alt text](public/images/1.png?raw=true "Tela de login")

![Alt text](public/images/2.png?raw=true "Tela de Registro")

![Alt text](public/images/3.png?raw=true "Dashboard")

![Alt text](public/images/4.png?raw=true "Tela de refrigerantes")

![Alt text](public/images/5.png?raw=true "Modal de cadastro/edição de refrigerantes")

![Alt text](public/images/6.png?raw=true "Dashboard com menu recolhido")
