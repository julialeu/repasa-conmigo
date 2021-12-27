

## About Repasa-Conmigo

Proyecto personal para crear test de preguntas y respuestas.

## Setup

- Create a database called "repasa_conmigo"
- cp .env.example .env
- Change in .env file these environment variables with the correct values: "DB_DATABASE", "DB_USERNAME", "DB_PASSWORD"
- composer install
- php artisan key:generate
- php artisan migrate


## How to Run the project

php artisan serve


## How to Rebuild JS and CSS

npm run watch
