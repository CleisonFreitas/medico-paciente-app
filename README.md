# API medico-paciente-app

## Objetivo

O objetivo desta API é listar médicos e seus pacientes, divididos por cidade. A API permite o cadastro de pacientes, médicos, e as cidades são cadastradas via Seeder.

## Como usar

1. Clone o projeto em sua máquina local.

2. Execute os seguintes comandos para configurar o ambiente:

   ```bash
   composer update
   cp .env.example .env


3. Inicie os containers usando:

    ```bash
    ./vendor/bin/sail up


4. Execute os seguintes comandos para tornar o projeto funcional:

    ```bash
    ./vendor/bin/sail artisan key:generate
    ./vendor/bin/sail artisan jwt:secret

5. Execute as migrações e seeders para criar a estrutura do banco de dados e a inserção dos dados da cidade:

    ```bash
    php artisan migrate
    php artisan db:seed

6. Crie um usuário genérico usando o comando:

    ```bash
    php artisan app:create-user
            ou
    php artisan app:create-user NameExample example@example.com minha-senha //Para atribuir usuário,email e senha específicos


# API medico-paciente-app
Todas as rotas abaixo são públicas, ou seja, não exigem autenticação:

- Requisição GET para dominio/api/cidades: retorna todas as cidades cadastradas.

- Requisição GET para dominio/api/medicos: retorna todos os médicos cadastrados.

- Requisição GET para dominio/api/cidades/{id_cidade}/medicos: retorna todos os médicos de uma cidade específica.
