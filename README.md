# 🎓 Course Enrollment System

A Laravel 11-based course enrollment system using Livewire 3 for real-time interactions, Tailwind CSS for styling.
---

## 🔧 Features

### Web (Livewire)
- User authentication (registration & login)
- Course listing with:
  - Pagination (10 per page)
  - Filter: Enrolled / Not Enrolled
  - Enroll and cancel enrollment
- Course detail page with:
  - Title, description, duration
  - Comment section with real-time updates
  - Comment form and delete option
- Policies to restrict access to enrolled-only course details

---

# Getting Started

# Prerequisites
- PHP 8.2+
- Composer
- Laravel 11
- Node.js & npm
- Redis (or use `database` driver for queue)
- MySQL / PostgreSQL

# Installation


git clone https://github.com/willycole12345/courseenrollmentsystemapi
cd courseenrollmentsystemapi

# Install dependencies
composer install
npm install && npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Migrate and seed database
php artisan migrate --seed

# Run queue worker
php artisan queue:work

# Start development server
php artisan serve
