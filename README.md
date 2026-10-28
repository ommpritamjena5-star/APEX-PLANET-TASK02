# ApexPlanet Task 2 - CRUD Application

## Project Overview

A PHP and MySQL-based web application with user authentication, CRUD functionality, and a modern, responsive user interface featuring rich text formatting (Bold, Italic, Underline).

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3 (Custom Design System & Modern Typography)
- XAMPP
- Git & GitHub

## Features

- User Registration with Duplicate Username Validation
- Secure Password Hashing (`password_hash` with `PASSWORD_DEFAULT`)
- User Login & Session-based Authentication
- Full CRUD operations on Posts:
  - Create new posts with rich formatting toolbar
  - View all posts with author metadata and timestamps
  - Update and edit existing posts
  - Delete posts with confirmation prompts
- Rich text formatting toolbar (**Bold**, *Italic*, <u>Underline</u>) with keyboard shortcuts (`Ctrl+B`, `Ctrl+I`, `Ctrl+U`)
- Modern, accessible UI with Plus Jakarta Sans typography, card-based layout, and interactive micro-animations

## Database Setup

1. Open **phpMyAdmin** (`http://localhost/phpmyadmin/`) or MySQL CLI.
2. Import the provided [`database.sql`](database.sql) file.
3. The database name is `blog`, with two tables: `users` and `posts`.

### Database Schema

#### `users` Table
| Column | Type | Attributes |
|---|---|---|
| id | INT | PRIMARY KEY, AUTO_INCREMENT |
| username | VARCHAR(100) | UNIQUE, NOT NULL |
| password | VARCHAR(255) | NOT NULL |

#### `posts` Table
| Column | Type | Attributes |
|---|---|---|
| id | INT | PRIMARY KEY, AUTO_INCREMENT |
| title | VARCHAR(255) | NOT NULL |
| content | TEXT | NOT NULL |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP |

## Project Structure

```text
ApexPlanet-Task-2/
├── config/
│   └── database.php
├── auth/
│   ├── register.php
│   ├── login.php
│   └── logout.php
├── posts/
│   ├── create.php
│   ├── index.php
│   ├── edit.php
│   └── delete.php
├── database.sql
├── index.php
├── README.md
└── style.css
```