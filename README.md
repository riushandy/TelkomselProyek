# Inventory Management System

Prototype aplikasi **Inventory Management System** berbasis web menggunakan **Laravel 11**.

## 🚀 Tech Stack

- PHP 8.2
- Laravel 11
- MySQL
- Tailwind CSS
- Laravel Breeze
- Vite

---

# 📌 Features

## Authentication
- Login
- Register
- Logout
- Forgot Password

## Role Management
- Admin
- Staff
- Manager

## Master Product
- Add Product
- Edit Product
- Delete Product
- Product Detail
- Search Product
- Pagination

## Borrowing Management
- Create Borrowing
- Return Product
- Borrowing History
- Borrowing Status

## Dashboard
- Total Product
- Available Product
- Borrowed Product
- Monthly Borrowing Chart

---

# ⚙️ Installation

Clone repository

```bash
git clone https://github.com/USERNAME/telkomsel-inventory.git
```

Masuk ke folder project

```bash
cd telkomsel-inventory
```

Install dependency

```bash
composer install
```

Install Node Module

```bash
npm install
```

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Atur konfigurasi database pada file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=telkomsel
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration dan seeder

```bash
php artisan migrate --seed
```

Compile asset

```bash
npm run dev
```

Jalankan server

```bash
php artisan serve
```

Buka browser

```
http://127.0.0.1:8000
```

---

# 👤 Testing Account

## Administrator

Email

```
admin@telkomsel.com
```

Password

```
password
```

## Staff

Email

```
staff@telkomsel.com
```

Password

```
password
```

## Manager

Email

```
manager@telkomsel.com
```

Password

```
password
```

---

# 📂 Database

Database SQL tersedia pada file

```
telkomsel.sql
```

atau dapat dibuat menggunakan

```bash
php artisan migrate --seed
```

---

# 👨‍💻 Author

Nama : Riu Shandy Lintar Pratama
