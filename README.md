# BD-ControleDeGastos

## Após fazer o clone do Projeto

Rode os Comandos
```bash
cd BD-ControleDeGastos
docker compose up --build -d
```
- Rota da Aplicação localhost:8080

## Configurando Banco de Dados
- Renomear o Arquivo .env.exemple para .env
- Modificar o Arquivo .env
  
```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=controledegastos
  DB_USERNAME=root
  DB_PASSWORD=123123
```

Rode os Comandos
```bash
cd /src
sudo chmod o+w ./storage/ -R
php artisan key:generate
php artisan migrate --seed
```
- Após o Migrate... altere o **DB_HOST** com o mesmo nome do seu container database: **DB_HOST=mysql**

## Rotas
## Authentication
  ```bash
    http://localhost:8080/api/auth/login  (POST)

    funcionalidade: Realiza a authenticação do Usuário
    Parâmetros:
    {
      "email": "providenci.marks@example.net",
      "password": "password"
    }
  ```

```bash
  http://localhost:8080/api/auth/register (POST)

  funcionalidade: Cadastrar um novo Usuário
  Parâmetros:
  {
    "name": string,
    "email": string,
    "password": string
  }
```

## Users - Rota Autenticada!
```bash
  http://localhost:8080/api/users/id (GET)
  Visualiza o Usuário pelo seu ID
```

## category-receitas - Rota Autenticada!
```bash
  http://localhost:8080/api/category-receitas (POST)

  funcionalidade: Adiciona Uma Categorias de Receitas
  Parâmetros:
  {
    "name": "Compras",
    "description": ""
  }

```
```bash
  http://localhost:8080/api/category-receitas (GET)
  Visualiza todas as Categorias das Receitas
```

## status-receitas - Rota Autenticada!
```bash
  http://localhost:8080/api/status-receitas (POST)

  funcionalidade: Adiciona Uma Categorias de Receitas
  Parâmetros:
  {
    "name": "Compras",
    "description": "",
    "status": "deposito"
  }
```
