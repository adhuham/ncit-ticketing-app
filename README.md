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

## Design Choice
- Laravel Form Requests were used to validate the requests to make the system more modular. Every request to the controller contains a corresponding form request file that contains the validation logic
- Enums were used to store Severity and Status detail as they often do not change. Built-in laravel enum casts were used.
- Categories are stored on a seperate table and is related to the tickets table via a join. This ensures the extensibility of the system as it allows adding more categories when the need arise.
- PHPUnit test is created to test ticket creation function 

## Roles and Permission
- A separate table will be created for roles and permissions. Each role will have several permissions.
- Users will be assigned roles.
- Based on the role the user has, the relevant permissions will be taken into when authorizing.


## Class Diagram
![Alt text](diagram.png?raw=true "Class Diagram")
