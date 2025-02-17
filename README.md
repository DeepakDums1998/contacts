
# **Laravel Contacts Project Setup Guide**

This document will guide you through setting up the **Laravel Contacts Project** on your local environment.

## **Requirements**

Before you start, ensure you have the following installed on your machine:

- PHP >= 8.0
- Composer
- MySQL or any other database of your choice
- Node.js and NPM (for front-end dependencies)
- Laravel 11.x
- Laravel Sail or Docker (optional, for development environment)

## **Steps to Set Up the Project**

### 1. **Clone the Repository**

First, clone the project repository to your local machine.

```bash
git clone https://github.com/DeepakDums1998/contacts.git
```

### 2. **Install Dependencies**

Navigate to the project folder:

```bash
cd contacts
```

Install PHP dependencies via **Composer**:

```bash
composer install
```

Install front-end dependencies via **NPM**:

```bash
npm install
```

### 3. **Set Up Environment File**

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

### 4. **Generate Application Key**

Generate a new **app key** for your Laravel application:

```bash
php artisan key:generate
```

### 5. **Set Up Database**

- Make sure your database is created in your MySQL or database system.
- Open the `.env` file and update the following variables to match your environment:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 6. **Run Migrations & Seeders**

If your project includes database migrations and seeders, run the following commands:

```bash
php artisan migrate
php artisan db:seed
```

### 7. **Set Up Frontend Assets**

Compile the front-end assets using **Laravel Mix**:

```bash
npm run dev
```

If you want to build production-ready assets, run:

```bash
npm run production
```

### 8. **Set Up Development Server (Optional)**

If you are using **Laravel Sail** (Docker-based development environment), you can start the Sail environment:

```bash
./vendor/bin/sail up
```

If you are using a local development environment, start the server with:

```bash
php artisan serve
```

By default, the application should now be running at `http://localhost:8000`.


### 9. **Authentication (If Applicable)**

If your project uses **Livewire** for authentication, visit the `/login` route and follow the login or registration flow.

### 10. **Testing Your Application**

After completing the setup, visit the URL in your browser (default is `http://localhost:8000`) and check if everything works as expected.

## **Common Commands**

Here are some helpful commands for managing your Laravel project:

- **Run Migrations:**

```bash
php artisan migrate
```

- **Clear Cache:**

```bash
php artisan cache:clear
```

- **Start Development Server:**

```bash
php artisan serve
```

- **Run Tests:**

```bash
php artisan test
```

## **Contributing**

If you'd like to contribute to this project, please fork the repository and submit a pull request with your changes.

## **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
