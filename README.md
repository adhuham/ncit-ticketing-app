# Ticketing System
A ticketing system for NCIT.

## Setup
To run the project:
- Clone the repository
- Run `composer install` and `npm install`
- Create `.env` file and fill in the database credentials
- Generate app key: `php artisan key:generate`
- Run migration using `php artisan migrate`
- Run seeds: `php artisan db:seed`
- Build file with `npm run build`

Finally serve the project `php artisan serve`.
