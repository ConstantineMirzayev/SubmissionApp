## Setup Instructions
1. Clone the repository.  
2. Install dependencies:  
    ```bash
    composer install
3. Duplicate .env.example file and rename it to .env
4. Configure the .env file with your database details.
5. Run the migrations:
    ```bash
    php artisan migrate
6. Run server:
    ```bash
    php artisan serve

## Run Tests
    ```bash
    php artisan test