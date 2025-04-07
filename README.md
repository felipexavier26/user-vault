# Projeto: Gerenciador de Usuários - Laravel

## Descrição

Este projeto é uma aplicação web desenvolvida com o Laravel que permite o gerenciamento de usuários, incluindo autenticação, edição de perfil, upload de imagem de perfil e atualização de senha com validação e alertas visuais utilizando SweetAlert2.


## Tecnologias Utilizadas

- **Laravel 10**
- **PHP 8+**
- **SweetAlert2**
- **Tailwind CSS** 
- **Vite**
- **Blade Components** 
- **MySQL** 

## Tecnologias Utilizadas

- **Autenticação com e-mail e senha**
- **Verificação de e-mail antes de acessar a dashboard**
- **CRUD de usuários (UsuarioController)**
- **Edição de perfil (ProfileController)** 
- **Upload de imagem de perfil**
- **Validação de senha forte e confirmação** 
- **Feedback visual com SweetAlert2 para sucesso e erros** 
- **Middleware auth e verified protegendo rotas**
- **Sistema de rotas com agrupamento por middleware**


## Ambiente Necessário

- **PHP:** >= 8.2 
- **Composer:** (para gerenciar dependências do PHP)
- **MySQL:** >= 8.x

## Instruções de Instalação

### Backend (Laravel)

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/felipexavier26/user-vault.git

2. **Navegue até o diretório do projeto:**
   ```bash
   cd user-vault

3. **Instale as dependências do Laravel:**
   ```bash
   composer install
   npm install

4. **Crie o arquivo .env:**
   ```bash
   cp .env.example .env


5. **Execute as migrações e população do banco:**
   ```bash
   php artisan migrate
   php artisan db:seed 

6. **Configure o banco de dados no .env:**
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=deep
    DB_USERNAME=root
    DB_PASSWORD=


5. **Crie um arquivo .env a partir do arquivo .env.example:**
   ```bash
   cp .env.example .env

6. **Gere a key e rode as migrations:**
   ```bash
   php artisan key:generate
   php artisan migrate
 

7. **Compile os assets com Vite:**
    ```bash
   npm run dev
  
7. **Inicie o servidor:**
    ```bash
   php artisan serve

   