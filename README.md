## Installation

- Nusiklonuokite repositorija
- Atsidarykite .env.example ir pakeiskite DB_USERNAME ir DB_PASSWORD į norimas reikšmes.
- Pervardinkite .env.example į .env (mv .env.example .env)
- docker-compose up -d
- docker-compose exec app composer install
- docker-compose exec app php artisan key:generate
- Tinklalapis turėtų būti pasiekiamas adresu: localhost:8000
