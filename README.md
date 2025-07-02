
# ZANAEMS - Zana Employees Management System - Laravel 11 Project

Welcome to the Zanacore Laravel 11 project. This guide will help you set up the project on your local development environment step-by-step.

---

## 🚀 Requirements

- PHP 8.2+
- Composer
- Node.js & npm
- SQLite / MySQL / PostgreSQL (based on `.env`)
- Laravel CLI (`php artisan`)

---

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/zanacore.git
cd zanacore
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Copy the `.env` File

```bash
cp .env.example .env
```

> Edit the `.env` file to set your database configuration.

Example for SQLite:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

Example for MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=zanacore
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate the Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

> Ensure that any required tables (e.g., departments) are seeded before dependent tables (e.g., users).

---

## 🖼️ Frontend (Vite)

### 6. Install Node Dependencies

```bash
npm install
```

### 7. Compile Assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

---

## ▶️ Serve the Application

```bash
php artisan serve
```

Visit [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## 🧽 Optional Commands

- Refresh DB:  
  ```bash
  php artisan migrate:fresh --seed
  ```

- Clear config/cache:
  ```bash
  php artisan config:clear
  php artisan cache:clear
  php artisan route:clear
  php artisan view:clear
  ```

---

## 📁 Notes

- The `vendor/` and `node_modules/` folders are not committed to Git. They must be installed per machine.
- If you encounter `ViteManifestNotFoundException`, make sure to run `npm run dev`.

---

Happy coding! ⚡  
Made with ❤️ by Antonis
