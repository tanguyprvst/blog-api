<h1 align="center">Laravel + Vue.js Blog</h1>

<p align="center">Simple Blog créé avec Laravel 10 et VueJs3</p>

## Comment l'installer

#### Cloner le repos

```bash
git clone
```

#### Copier le fichier .env.example en .env

#### Installer avec Composer

```bash
composer install
```

#### Générer la clé

```bash
php artisan key:generate
```

#### Modifier le .env en ajoutant ces clés avec votre url
```bash
SESSION_DOMAIN=blog-api.test
SESSION_DRIVER=cookie
SANCTUM_STATEFUL_DOMAINS=http://blog-api.test,blog-api.test
```
#### Migrer la base de donnée

```bash
php artisan migrate
```

#### Lancer les Seeder

```bash
php artisan db:seed
```

#### Installer les dépendences

```bash
npm install

npm run dev
```