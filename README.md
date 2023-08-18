# BD-ControleDeGastos

## Após fazer o clone do Projeto
- cd BD-ControleDeGastos
- rode o comando **docker compose up --build -d**
- Rota da Aplicação localhost:8080

## Configurando Banco de Dados
- Modificar o Arquivo .env
  <br />
 <p>DB_CONNECTION=mysql</p>
 <p>DB_HOST=127.0.0.1</p>
 <p>DB_PORT=3306</p>
 <p>DB_DATABASE=seu_banco</p>
 <p>DB_USERNAME=root</p>
 <p>DB_PASSWORD=sua_senha</p>
 
- rode o comando php artisan migrate --seed
- Após o Migrate... altere o **DB_HOST** com o mesmo nome do seu container database: **DB_HOST=mysql**

## Rotas
## <p>Authentication</p>
**<p>http://localhost:8080/api/auth/login  (POST)</p>**
<p>funcionalidade: Realiza a authenticação do Usuário</p>
Parâmetros
{"email": "providenci.marks@example.net", "password": "password"}
<br>
<br>

**<p>http://localhost:8080/api/auth/register (POST)</p>**
<p>funcionalidade: Cadastrar um novo Usuário</p>
Parâmetros
{"name": string, "email": string,"password": string}
<br>

## Users - Rota Autenticada!

**<p>http://localhost:8080/api/users/id (GET)</p>**
<p>Visualiza o Usuário pelo seu ID</p>


## category-receitas - Rota Autenticada!
**<p>http://localhost:8080/api/category-receitas (POST)</p>**
<p>Adiciona Uma Categorias de Receitas</p>
Parâmetros
 {"name": "Compras","description": ""}
<br>

**<p>http://localhost:8080/api/category-receitas (GET)</p>**
<p>Visualiza todas as Categorias das Receitas</p>


## status-receitas - Rota Autenticada!
**<p>http://localhost:8080/api/status-receitas (POST)</p>**
<p>Adiciona Uma Categorias de Receitas</p>
Parâmetros
 {"name": "Compras","description": "", "status": "deposito" }
<br>




**Exemplo .env**
<p>DB_CONNECTION=mysql</p>
<p>DB_HOST=127.0.0.1</p>
<p>DB_PORT=3306</p>
<p>DB_DATABASE=seu_banco</p>
<p>DB_USERNAME=root</p>
<p>DB_PASSWORD=sua_senha</p>
