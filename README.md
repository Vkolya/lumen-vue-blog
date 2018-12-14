# lumen-vue-blog

Technologies used:
### FRONTEND
  - [Vue.js 2](https://vuejs.org/)
  - [Vue Router](https://router.vuejs.org/)
  - [Vuex](https://vuex.vuejs.org/)
  - [Vue Cli 3](https://cli.vuejs.org/)
  - [Laravel-vue-pagination](https://github.com/gilbitron/laravel-vue-pagination)
  - [Bootstrap-vue](https://bootstrap-vue.js.org/)
### BACKEND:
  - [Lumen 5.6](https://lumen.laravel.com/docs/5.6)
  - [JWT authentication](https://github.com/tymondesigns/jwt-auth)
  - [Laravel-cors](https://github.com/barryvdh/laravel-cors)

## Quick Start

### Backend

```bash
cd api
composer install
# configure your key, database, etc in `.env` file
php artisan migrate --seed
# generate jwt token
php artisan jwt:secret
php -S localhost:9000 -t public
```

### Frontend

```bash
cd app
npm install
npm run serve
```
