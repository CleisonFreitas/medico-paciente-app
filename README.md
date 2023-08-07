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
    // Por padrão, a aplicação irá funcionar na porta 80, porém é possível alterar a porta padrão no arquivo .env, em APP_PORT. Ex: APP_PORT=8011
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
    ./vendor/bin/sail artisan app:create-user
            ou
    //Para atribuir usuário,email e senha específicos
    ./vendor/bin/sail artisan app:create-user NameExample example@example.com minha-senha 


# Utilizando a API
Para fazer a autenticação:
- Requisição POST para dominio/api/login
    ```bash
    Request: {
        "email": string,
        "password": string
    }
    // Utilizar o token gerado para acessar as urls privadas.

Todas as rotas abaixo são públicas, ou seja, não exigem autenticação:

- Requisição GET para dominio/api/cidades: retorna todas as cidades cadastradas.

    ```bash
    {
        "data": [
            {
                "id": 1,
                "nome": "North Codystad",
                "estado": "Colorado",
                "created_at": "2023-08-07T01:34:34.000000Z",
                "updated_at": "2023-08-07T01:34:34.000000Z"
            },
            {
                "id": 2,
                "nome": "Watsicaton",
                "estado": "Illinois",
                "created_at": "2023-08-07T01:34:34.000000Z",
                "updated_at": "2023-08-07T01:34:34.000000Z"
            },
        ]
    }
    

- Requisição GET para dominio/api/medicos: retorna todos os médicos cadastrados.

     ```bash
    {
        "data": [
            {
                "id": 1,
                "nome": "Dra. Alessandra Moura",
                "especialidade": "Neurologista",
                "created_at": "2023-08-07T02:12:18.000000Z",
                "updated_at": "2023-08-07T02:12:18.000000Z",
                "cidade": {
                    "id": 1,
                    "nome": "North Codystad",
                    "estado": "Colorado",
                    "created_at": "2023-08-07T01:34:34.000000Z",
                    "updated_at": "2023-08-07T01:34:34.000000Z"
                }
            },
            {
                "id": 2,
                "nome": "Dr. Márcio Donato",
                "especialidade": "Cirurgião",
                "created_at": "2023-08-07T02:12:45.000000Z",
                "updated_at": "2023-08-07T02:12:45.000000Z",
                "cidade": {
                    "id": 2,
                    "nome": "Watsicaton",
                    "estado": "Illinois",
                    "created_at": "2023-08-07T01:34:34.000000Z",
                    "updated_at": "2023-08-07T01:34:34.000000Z"
                }
            }
        ]
    }

- Requisição GET para dominio/api/cidades/{id_cidade}/medicos: retorna todos os médicos de uma cidade específica.


Rotas que exigem autenticação:

- Requisição POST para dominio/api/medicos: retorna os dados do médico cadastrado.

    ```bash
    Request:
    {
        "nome": "string",
        "especialidade": "string",
        "cidade_id": "int"
    }

    Response:
    {
        "data": {
            "id": 3,
            "nome": "Dr. Gustávo Lazaro",
            "especialidade": "Cirurgião",
            "created_at": "2023-08-07T02:18:46.000000Z",
            "updated_at": "2023-08-07T02:18:46.000000Z",
            "cidade": {
                "id": 1,
                "nome": "North Codystad",
                "estado": "Colorado",
                "created_at": "2023-08-07T01:34:34.000000Z",
                "updated_at": "2023-08-07T01:34:34.000000Z"
            }
        }
    }

- Requisição POST para dominio/api/pacientes: retorna os dados do paciente cadastrado.

    ```bash
    Request:
    {
        "nome": "string",
        "cpf": "string",
        "celular": "string"
    }

    Response:
    {
        "data": {
            "id": 1,
            "nome": "Matheus Henrique",
            "cpf": "795.429.941-60",
            "celular": "(11) 9 8432-5789",
            "created_at": "2023-08-07T02:31:31.000000Z",
            "updated_at": "2023-08-07T02:31:31.000000Z"
        }
    }
- Requisição PUT para dominio/api/pacientes/:id_paciente: retorna os dados do paciente atualizado.
     ```bash
    Request:
    {
        "nome": "string",
        "celular": "string"
    }

    Response:
    {
        "data": {
            "id": 1,
            "nome": "Matheus Henrique",
            "cpf": "795.429.941-60",
            "celular": "(11) 9 8432-5789",
            "created_at": "2023-08-07T02:31:31.000000Z",
            "updated_at": "2023-08-07T02:31:31.000000Z"
        }
    }

- Requisição POST para dominio/api/medicos/:id_medico/pacientes: retorna os dados do medico e do paciente recém vinculados
    ```bash
    Request:
    {
        "id_medico": Int,
        "id_paciente": Int
    }

- Requisição GET para dominio/api/medicos/:id_medico/pacientes: retorna os dados dos pacientes vinculados ao médico da requisição.
