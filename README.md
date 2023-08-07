# API medico-paciente-app

## Objetivo

O objetivo desta API é listar médicos e seus pacientes, divididos por cidade. A API permite o cadastro de pacientes, médicos, e as cidades são cadastradas via Seeder.

## Como usar

1. Clone o projeto em sua máquina local.

2. Após acessar o ambiente, execute os seguintes comandos para configurar o ambiente:

   ```bash
   composer update
   cp .env.example .env


3. Inicie os containers usando:

    ```bash
    // Por padrão, a aplicação irá funcionar na porta 80, porém é possível alterar a porta padrão no arquivo .env, em APP_PORT. Ex: APP_PORT=8011
    ./vendor/bin/sail up


4. Abra o projeto em uma nova instância e execute os seguintes comandos para tornar o projeto funcional:

    ```bash
    ./vendor/bin/sail artisan key:generate
    ./vendor/bin/sail artisan jwt:secret

5. Execute as migrações e seeders para criar a estrutura do banco de dados e a inserção dos dados da cidade:

    ```bash
    ./vendor/bin/sail artisan migrate
    ./vendor/bin/sail artisan db:seed

6. Dessa etapa em diante será necessário observar se aplicação já foi devidamente compilada no Docker. Crie um usuário genérico usando o comando:

    ```bash
    ./vendor/bin/sail artisan app:create-user
            ou
    //Para atribuir usuário,email e senha específicos
    ./vendor/bin/sail artisan app:create-user NameExample example@example.com minha-senha 


# Utilizando a API
- Para acessar a documentação da API e testar os endpoints basta acessar a url do seu domínio e porta, mais /api/documentation. Ex: Se sua aplicação, atualmente, está funcionando na porta 80:

    ```bash
    http://localhost/api/documentation

    // Caso utilize criptografia
    https://localhost/api/documentation

# Contato
Email: cleison51@hotmail.com
