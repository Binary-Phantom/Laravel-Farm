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
cd your-repository
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

This will start the necessary services such as:

* PHP
* Laravel
* Web server
* Database

---

# 📦 4. Install Laravel dependencies

Install the project dependencies using Composer inside the container:

```bash
docker compose exec app composer install
```

---

# 🔑 5. Generate application key

Laravel requires an application key for security purposes.

Run:

```bash
docker compose exec app php artisan key:generate
```

---

# 🗄️ 6. Run database migrations

Create the database tables by running:

```bash
docker compose exec app php artisan migrate
```

If the project contains seed data, you can populate the database with:

```bash
docker compose exec app php artisan db:seed
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


# 🚜 Sistema de Gestão de Fazendas

Sistema web desenvolvido com **Laravel, Bootstrap, Docker e MySQL/PostgreSQL** para gerenciamento de fazendas, gado e veterinários.

O sistema permite controlar informações de produção de leite, consumo de ração e dados dos animais, auxiliando na gestão das propriedades rurais.

---

# 📋 Pré-requisitos

Antes de rodar o projeto localmente, é necessário ter instalado:

* 🐳 **Docker**
* 🐳 **Docker Compose**
* 🌐 **Git**

Verifique se estão instalados executando:

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

Entre na pasta do projeto:

```bash
cd seu-repositorio
```

---

# ⚙️ 2. Configurar variáveis de ambiente

Copie o arquivo de exemplo `.env.example` para `.env`.

```bash
cp .env.example .env
```

Edite o arquivo `.env` e configure o banco de dados.

### Exemplo usando MySQL

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=fazenda
DB_USERNAME=root
DB_PASSWORD=root
```

### Exemplo usando PostgreSQL

```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=fazenda
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

---

# 🐳 3. Subir os containers Docker

Execute o comando abaixo para construir e iniciar os containers:

```bash
docker compose up -d --build
```

Isso iniciará os serviços necessários para o projeto, como:

* PHP
* Laravel
* Servidor web
* Banco de dados

---

# 📦 4. Instalar dependências do Laravel

Instale as dependências do projeto utilizando o Composer dentro do container:

```bash
docker compose exec app composer install
```

---

# 🔑 5. Gerar chave da aplicação

Laravel precisa de uma chave de segurança para funcionar corretamente.

Execute:

```bash
docker compose exec app php artisan key:generate
```

---

# 🗄️ 6. Rodar as migrations

Crie as tabelas do banco de dados:

```bash
docker compose exec app php artisan migrate
```

Se o projeto possuir dados iniciais, execute também:

```bash
docker compose exec app php artisan db:seed
```

---

# 🚀 7. Rodar o projeto

Após concluir as etapas anteriores, abra no navegador:

```
http://localhost:8000
```

O sistema estará pronto para uso.


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

* Cadastro de **Fazendas**
* Cadastro de **Veterinários**
* Cadastro de **Gado**
* Controle de **produção de leite**
* Controle de **consumo de ração**
* **Relatórios e dashboards**

---

# 📄 Licença

Este projeto foi desenvolvido para fins pessoais.
