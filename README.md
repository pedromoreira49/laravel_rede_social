<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Setup do Projeto:

### Instalando dependencias

```bash
  php composer install
```

### Configurando banco de dados
* Verifique seu arquivo .env com as configurações corretas com o seu banco de dados

```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=root
  DB_PASSWORD=
```

### Rodando as migrations e seeders:

```bash
  php artisan migrate --seed
```

### Iniciando servidor

```bash
  php artisan serve
```

## Documentação da API

### Realizar register

```http
  POST api/register
```
### Exemplo:

```bash
  curl -XPOST http://127.0.0.1:8000/api/register -H "Content-Type: application/json" -d "{\"name\":\"Pedro Moreira\", \"email\": \"pedro@gmail.com\", \"password\": \"admin123123\", \"password_confirmation\": \"admin123123\"}"
```

### Realizar login
```http
  POST api/login
```
### Exemplo:
```bash
    curl -XPOST http://127.0.0.1:8000/api/login -H "Content-Type: application/json" -d "{\"email\": \"pedro@gmail.com\", \"password\": \"admin123123\"}"
```

OBS: Returned a token.

### Visualizar Posts
```http
    GET api/posts
```

### Visualizar um Post
```http
    GET api/posts/{id}
```
### Exemplo:
```bash
  curl -XGET http://127.0.0.1:8000/api/posts/1
```

### Cadastrar um Post
```http
    POST api/posts
```
### Exemplo:
```bash
    curl -XPOST http://127.0.0.1:8000/api/posts -H "Content-Type: application/json" -H "Authorization: Bearer <login_token>" -d "{\"title\": \"Example Title\", \"content\": \"Example body of post.\"}"
```

### Atualizar um Post
```http
  PUT/PATCH api/posts/{id}
```
### Exemplo:
```bash
  curl -XPUT http://127.0.0.1:8000/api/posts/1 -H "Content-Type: application/json" -H "Authorization: Bearer <login_token>" -d "{\"title\": \"Example title updated\", \"content\": \"Example body of post updated\"}"
```
### Deletar um Post
```
  DELETE api/posts/{id}
```
### Exemplo:
```bash
  curl -XDELETE http://127.0.0.1:8000/api/posts/1 -H "Authorization: Bearer <login_token>"
```

### Listar users
```http
  GET api/users
```
### Exemplo:
```bash
  curl -XGET http://127.0.0.1:8000/api/users -H "Authorization: Bearer <login_token>"
```
### Atualizar um User
```http
  PUT/PATCH api/users/{id}
```
### Exemplo:
```bash
  curl -XPUT http://127.0.0.1:8000/api/users/1 -H "Content-Type: application/json" -H "Authorization: Bearer <login_token>" -d "{\"name\": \"Joao Pedro Moreira\", \"email\": \"jpedro@gmail.com\", \"password\": \"adminadmin\", \"password_confirmation\": \"adminadmin\"}"
```

### Deletar um User
```
  DELETE api/users/{id}
```
### Exemplo:
```bash
  curl -XDELETE http://127.0.0.1:8000/api/users/1 -H "Authorization: Bearer <login_token>"
```

### Listar produtos
```http
  GET api/products
```
### Exemplo:
```bash
  curl -XGET http://127.0.0.1:8000/api/products -H "Authorization: Bearer <login_token>"
```
### Listar produtos com paginação
```http
  GET api/products
```
### Exemplo:
```bash
  curl -XGET http://127.0.0.1:8000/api/products?per_page=1 -H "Authorization: Bearer <login_token>"
```
### Mostrar produto
```http
  GET api/products
```
### Exemplo:
```bash
  curl -XGET http://127.0.0.1:8000/api/products/{product} -H "Authorization: Bearer <login_token>"
```
### Atualizar um produto
```http
  PUT/PATCH api/products/{product}
```
### Exemplo:
```bash
  curl -XPUT http://127.0.0.1:8000/api/products/{product} -H "Content-Type: application/json" -H "Authorization: Bearer <login_token>" -d "{\"name\": \"Example name Prod\", \"description\": \"Example description Prod\", \"price\": 1234.90}"
```

### Deletar um produto
```
  DELETE api/products/{product}
```
### Exemplo:
```bash
  curl -XDELETE http://127.0.0.1:8000/api/products/{product} -H "Authorization: Bearer <login_token>"
```
