Begin EN // PT-BR
# 🚜 Farm Management System - "Laravel-Farm"

Web system developed with **Laravel, Bootstrap, Docker and MySQL/PostgreSQL** for managing farms, cattle and veterinarians.

The system allows monitoring **milk production, feed consumption and animal data**, helping with farm management and decision-making.

---

# 📋 Reqs

Before running the project locally, make sure the following tools are installed:

* 🐳 **Docker**
* 🐳 **Docker Compose**
* 🌐 **Git**

You can verify the installations by running:

```bash
docker --version
docker compose version
git --version
```

---

# 📥 1. Clone the repository

Clone the project from GitHub:

```bash
git clone https://github.com/Binary-Phantom/Laravel-Farm.git
```

Navigate into the project folder:

```bash
cd laravel-farm/src/src
```

---

# ⚙️ 2. Setup environment variables

Copy the `.env.example` file to create your `.env` configuration file.

```bash
cp .env.example .env
```

Edit the `.env` file and configure the database connection.

### Example using MySQL

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=farm
DB_USERNAME=root
DB_PASSWORD=root
```

### Example using PostgreSQL

```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=farm
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

---

# 🐳 3. Start Docker containers

Run the following command to build and start the containers:

```bash
docker compose up -d --build
```

This will start all the necessary services and dependencies such as:

* PHP
* Laravel
* Web server
* Database
* Composer

---

EXTRA: If the database container rerports something like error (1) or 500, you can try this one:

docker compose down -v
docker volume prune

---

# 📦 4. Manually Install Laravel dependencies (Optional)

If something fails you stiil able to download the project dependencies using Composer inside the container:

```bash
docker compose exec laravel composer install
```

---

# 🔑 5. Manually Generate application key (Optional)

By default the script wiil install the application key for security purposes automatically, but in case of something going wrong, check the .env file "APP_KEY" field to see if it was intalled. If it doesn't then:

Run:

```bash
docker compose exec laravel php artisan key:generate
```

---

# 🗄️ 6. Manually Run database migrations (Optional)

By default, the script will Create the database tables automatically but, in case of something goind wrong, you can do it manually by running:

```bash
docker compose exec laravel php artisan migrate
```


---

# 🚀 7. Run the project

After completing the steps above, open the application in your browser:

```
http://localhost:8000
```

The system should now be running.

---

# 👨‍💻 Technologies used

* **Laravel**
* **Bootstrap**
* **Docker**
* **Render**
* **MySQL / PostgreSQL**
* **PHP**

---

# 📊 Features

* **Farm registration**
* **Veterinarian registration**
* **Cattle management**
* **Milk production monitoring**
* **Feed consumption control**
* **Reports and dashboards**

---

# 📄 License

This project was developed for **personal purposes**.

---
---

# 🚜 Sistema de Gestão de Fazendas - "Laravel-Farm"

Sistema web desenvolvido com **Laravel, Bootstrap, Docker e MySQL/PostgreSQL** para gerenciamento de fazendas, gado e veterinários.

O sistema permite monitorar **produção de leite, consumo de ração e dados dos animais**, auxiliando na gestão da fazenda e na tomada de decisões.

---

# 📋 Requisitos

Antes de executar o projeto localmente, certifique-se de que as seguintes ferramentas estão instaladas:

* 🐳 **Docker**
* 🐳 **Docker Compose**
* 🌐 **Git**

Você pode verificar se estão instaladas executando:

```bash
docker --version
docker compose version
git --version
```

---

# 📥 1. Clonar o repositório

Clone o projeto do GitHub:

```bash
git clone https://github.com/Binary-Phantom/Laravel-Farm.git
```

Acesse a pasta do projeto:

```bash
cd laravel-farm/src/src
```

---

# ⚙️ 2. Configurar variáveis de ambiente

Copie o arquivo `.env.example` para criar o arquivo de configuração `.env`:

```bash
cp .env.example .env
```

Edite o arquivo `.env` e configure a conexão com o banco de dados.

### Exemplo utilizando MySQL

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=farm
DB_USERNAME=root
DB_PASSWORD=root
```

### Exemplo utilizando PostgreSQL

```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=farm
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

---

# 🐳 3. Iniciar os containers Docker

Execute o seguinte comando para **construir e iniciar os containers**:

```bash
docker compose up -d --build
```

Isso iniciará todos os serviços necessários para o sistema funcionar, como:

* PHP
* Laravel
* Servidor Web
* Banco de Dados
* Composer

---

EXTRA: Se o container do bd retornar algo como erro (1) ou 500, tente os comandos a seguir:

docker compose down -v
docker volume prune

---

# 📦 4. Instalar dependências do Laravel manualmente (Opcional)

Caso ocorra algum erro durante a inicialização, você pode instalar as dependências manualmente utilizando o Composer dentro do container:

```bash
docker compose exec laravel composer install
```

---

# 🔑 5. Gerar a chave da aplicação manualmente (Opcional)

Por padrão, o script gera automaticamente a **chave da aplicação** por motivos de segurança.

Caso algo dê errado, verifique no arquivo `.env` se o campo `APP_KEY` foi gerado.

Se não tiver sido, execute:

```bash
docker compose exec laravel php artisan key:generate
```

---

# 🗄️ 6. Executar as migrations do banco de dados (Opcional)

Normalmente o script cria automaticamente as tabelas do banco de dados.

Caso isso não aconteça, você pode executar manualmente:

```bash
docker compose exec laravel php artisan migrate
```

---

# 🚀 7. Executar o projeto

Após concluir os passos acima, abra a aplicação no navegador:

```
http://localhost:8000
```

O sistema deverá estar funcionando.

---

# 👨‍💻 Tecnologias utilizadas

* **Laravel**
* **Bootstrap**
* **Docker**
* **Render**
* **MySQL / PostgreSQL**
* **PHP**

---

# 📊 Funcionalidades

* **Cadastro de fazendas**
* **Cadastro de veterinários**
* **Gerenciamento de gado**
* **Monitoramento da produção de leite**
* **Controle de consumo de ração**
* **Relatórios e dashboards**

---

# 📄 Licença

Este projeto foi desenvolvido para **fins pessoais e educacionais**.

