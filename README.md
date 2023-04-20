## TodoTask
TodoTask é um sistema criado para mostrar um pouco do PHP e da framework Laravel, neste código foi utilizado:
- PHP 8.1
- Laravel Framework 10.0
- Laravel Sanctum 3.2
- Predis 2.1
- Laravel UI 4.2
- PHPunit 10.0
- Bootstrap 5.2.3
- Laravel Vite 0.7.2
- Jquery 3.6.4
- Docker
- Nginx Alpine
- Postgres
- *Redis

Testar aplicação no servidor
[https://todotask.herokuapp.com/](https://todotask.herokuapp.com/)

### Passo a passo
Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini
DB_CONNECTION=pgsql
DB_HOST=172.20.0.1
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Acessar o container
```sh
docker-compose exec app bash
```

Instalar as dependências do projeto
```sh
composer install
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Gerar os arquivos de resorces
```sh
npm install
```
```sh
npm run dev
```
Gere os dados no Banco:
```sh
php artisan migrate
```
```sh
php artisan db:seed --class=DatabaseSeeder
```

Acessar o projeto
[http://localhost:8989](http://localhost:8989)
