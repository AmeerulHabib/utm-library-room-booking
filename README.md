# UTM Library Room Booking System

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)

## Overview

The **UTM Library Room Booking System** is my final year project, a web-based application for Universiti Teknologi Malaysia (UTM) students and staff to reserve study rooms online. It streamlines the booking process, improves resource management, and enables library staff and administrators to efficiently manage bookings and user roles.

---

## Features

- **User Registration & Authentication**
    - Secure login and registration
    - Role-based dashboard (User/Staff/Admin)
- **Room Booking**
    - Browse available rooms and time slots
    - Submit, modify, or cancel bookings
    - View current and past bookings
- **Approval Workflow**
    - Booking approval/rejection by staff/admin
    - Status tracking (Pending, Approved, Rejected)
- **Room Management** (Staff/Admin)
    - Add, edit, or delete rooms
    - Set room details (capacity, location, etc.)
- **User Management** (Admin)
    - Create, edit, or remove users
    - Assign user roles (User/Staff/Admin)
- **Security**
    - Role-based access control (RBAC)
    - Session management and input validation
- **Responsive UI**
    - Optimized for desktop and mobile devices

---

## Technologies Used

- [Laravel 12.x (PHP 8.2+)](https://laravel.com/)
- MySQL / MariaDB
- Tailwind CSS, Blade Templates
- (Optional) AWS EC2/RDS, Cloudflare

---

## Installation

### Prerequisites

- PHP 8.2+
- Composer 2.x
- Node.js & NPM
- MySQL / MariaDB

### Setup Steps

1. **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/utm-library-room-booking.git
    cd utm-library-room-booking
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3. **Environment configuration:**
    - Copy `.env.example` to `.env`
    - Set your database and app config in `.env`
    - Generate application key:
    ```bash
    php artisan key:generate
    ```

4. **Run database migrations and seeders:**
    ```bash
    php artisan migrate --seed
    ```

5. **Build frontend assets:**
    ```bash
    npm run build
    ```

6. **Start the local server:**
    ```bash
    php artisan serve
    ```
    - Visit [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Usage

- Register as a user or login with provided credentials.
- Book rooms and manage your bookings.
- Staff/Admin users can access additional menus for room and user management.
- For detailed guidance, see [User Manual](docs/USER_MANUAL.md) (or section in this repo).

---

## Directory Structure

app/
Http/Controllers/
Models/
Policies/
Providers/
database/
migrations/
seeders/
resources/
views/
routes/
web.php
public/
.env.example


---

## Testing

- Run tests using PHPUnit:
    ```bash
    php artisan test
    ```

---

## Authors

- Muhammad Ameerul Hadzim (A19EE0080)
- Universiti Teknologi Malaysia (UTM)
- Supervisor: [Mr. Firoz bin Yusuf Patel Dawoodi]

---

## License

This project is licensed under the UTM (Universiti Teknologi Malaysia).

---

## Acknowledgments

- UTM Library staff and academic supervisors
- [Laravel](https://laravel.com/) and open-source contributors

---



