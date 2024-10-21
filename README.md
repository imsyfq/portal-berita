# Portal Berita PT. Winnicode Garuda Teknologi - Kelompok 5
## Installation

### Prerequisites

Make sure you have the following installed on your system:

- PHP >= 8.2
- Composer
- MySQL or any other supported database

### Steps

1. **Clone the repository:**

   ```bash
   git clone https://github.com/tb12as/portal-berita.git
   cd portal-berita
   ```

   ```bash
   # for ssh user
   git clone git@github.com:tb12as/portal-berita.git
   cd portal-berita
   ```

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Copy the `.env.example` file to `.env`:**

   ```bash
   cp .env.example .env
   ```

4. **Generate an application key:**

   ```bash
   php artisan key:generate
   ```

5. **Configure your database settings in the `.env` file:**

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run the database migrations:**

   ```bash
   php artisan migrate
   ```

7. **(If you need some data for testing) seed the database:**
   ```bash
    php artisan db:seed
   ```

8. **Start the development server:**

   ```bash
   php artisan serve
   ```

Your Laravel application should now be up and running at `http://localhost:8000`.
