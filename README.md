# 🦁 Zoo Management System

A web-based application designed to streamline zoo information management through a centralized platform. Developed with Laravel and PHP, the system provides CRUD (Create, Read, Update, and Delete) functionality, allowing users to efficiently manage zoo records.

## 📋 Table of Contents

- [About the Project](#-about-the-project)
- [Features](#-features)
- [Technologies](#-technologies)
- [Screenshots](#-screenshots)
- [Project Structure](#-project-structure)
- [Prerequisites](#-prerequisites)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Usage](#-usage)
- [Future Improvements](#-future-improvements)
- [Author](#-author)

## 📌 About the Project

The Zoo Management System is a web application developed to facilitate the administration and organization of zoo records.

The application implements the fundamental CRUD operations, enabling users to create, retrieve, update, and delete information through a user-friendly interface.

This project was developed to apply web development principles, database management, and the Laravel framework in a practical software development scenario.

## ✨ Features

- **Create Records:** Register new information in the system.
- **Read Records:** Retrieve and display existing information.
- **Update Records:** Modify previously stored information.
- **Delete Records:** Remove existing records from the database.
- **Database Integration:** Manage and persist information using MariaDB.
- **Responsive Interface:** User interface developed with Bootstrap.

## 🛠️ Technologies

The project was developed using the following technologies:

| Technology | Purpose |
|---|---|
| PHP | Backend development |
| Laravel | Backend framework |
| HTML5 | Web page structure |
| Bootstrap | Interface styling and responsive design |
| JavaScript | Client-side functionality |
| MariaDB | Relational database management |

## 📸 Screenshots

**Login**
<img width="1535" height="870" alt="image" src="https://github.com/user-attachments/assets/a48827b9-6232-4c25-b802-0aee0296f890" />

**Register**
<img width="1535" height="870" alt="image" src="https://github.com/user-attachments/assets/62b47d1a-05d0-4bf2-9868-df9d8d11da5d" />

**Menu**
<img width="1535" height="870" alt="image" src="https://github.com/user-attachments/assets/991c39c9-09ed-4e22-b8b9-4166a70004b1" />
<img width="1535" height="871" alt="image" src="https://github.com/user-attachments/assets/339b4bf7-cae2-4de9-ae0a-9139588b4bf3" />

**Create record**
<img width="1535" height="867" alt="image" src="https://github.com/user-attachments/assets/85f66680-18ff-4860-b1ed-dc8a463ae61c" />

**Records overview**
<img width="1533" height="872" alt="image" src="https://github.com/user-attachments/assets/6e5b738b-8ee2-4913-9982-86f2b53b0732" />

**Record view**
<img width="1535" height="870" alt="Captura de pantalla 2026-11-08 191626" src="https://github.com/user-attachments/assets/a0ff2f7a-28e4-40d8-bf70-397ba23f9716" />

## 📂 Project Structure

The application follows Laravel's standard project architecture.

```text
zoo-management-system/
│
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

## 📋 Prerequisites

Before installing the project, make sure you have the following tools installed:

- PHP (compatible with your Laravel version).
- Composer.
- MariaDB.
- Node.js and NPM (if required by the project's frontend assets).
- Git.

## ⚙️ Installation

Follow these steps to set up the project locally.

**1. Clone the repository**

```bash
git clone YOUR_REPOSITORY_URL
```

**2. Navigate to the project directory**

```bash
cd zoo-management-system
```

**3. Install PHP dependencies**

```bash
composer install
```

**4. Create the environment configuration file**

```bash
cp .env.example .env
```

**5. Generate the application key**

```bash
php artisan key:generate
```

## 🔧 Configuration

Configure your database connection in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=zoo_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Make sure your MariaDB database has been created before running the application.

**Run database migrations:**

```bash
php artisan migrate
```

## 🚀 Usage

Once the installation and configuration steps are complete, start the Laravel development server:

```bash
php artisan serve
```

Open your browser and navigate to:

```text
http://127.0.0.1:8000
```

## 🔮 Future Improvements

Potential enhancements for future versions include:

- User authentication and role-based access control.
- Advanced search and filtering functionality.
- Improved dashboard and data visualization.
- Additional validation and security mechanisms.
- Deployment to a production environment.

## 👨‍💻 Author

**Mercedes Rojas Ramos**

- GitHub: [@YOUR_USERNAME](https://github.com/YOUR_USERNAME)
- LinkedIn: www.linkedin.com/in/mercedes-rojas-ramos
