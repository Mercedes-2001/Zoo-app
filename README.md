# 🦁 Zoo Management System

A web-based application designed to streamline zoo information management through a centralized platform. Developed with Laravel and PHP, the system provides CRUD (Create, Read, Update, and Delete) functionality, allowing users to efficiently manage zoo records.

## 📋 Table of Contents

- [About the Project](#-about-the-project)
- [Features](#-features)
- [Technologies](#-technologies)
- [Project Structure](#-project-structure)
- [Prerequisites](#-prerequisites)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Usage](#-usage)
- [Screenshots](#-screenshots)
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

## 📸 Screenshots

Add screenshots of the application to showcase its interface and main functionalities.

<!-- Add your screenshots below -->

Example:

```markdown
![Main Dashboard](screenshots/dashboard.png)

![Records Management](screenshots/records.png)
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
- LinkedIn: [Your LinkedIn Profile](YOUR_LINKEDIN_URL)

---

*Developed as a web development project using Laravel, PHP, and MariaDB.*
