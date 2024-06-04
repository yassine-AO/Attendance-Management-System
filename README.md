# Centralized Attendance Management System

## Introduction

The **Centralized Attendance Management System** is a sophisticated web application designed to manage attendance (including tardiness and absences) efficiently across the four HEM campuses (Casablanca BS, ES Rabat BS, Marrakech BS, and Tanger BS). Developed as part of the fourth-semester project, this full-stack web application leverages the power of modern web technologies to automate and centralize attendance management, thereby enhancing productivity and communication within the educational ecosystem.

## Features

- **Automated Attendance Tracking**: Automatically record and manage student attendance.
- **Real-Time Reporting**: Generate detailed reports on attendance in real-time.
- **Cross-Platform Access**: Accessible from various devices including computers, tablets, and smartphones.
- **Efficient Communication**: Streamline communication between teachers and the administration, minimizing unnecessary email exchanges and paperwork.

## Technologies Used

### Programming Languages and Frameworks

- **PHP**: A widely-used open-source scripting language suitable for web development and embedded into HTML.
- **MySQL**: A robust, flexible, and user-friendly relational database management system.
- **Laravel**: An open-source PHP framework known for its elegant syntax, powerful tools, and features that simplify web application development.

### Laravel Features

- **Eloquent ORM**: Provides an expressive and intuitive syntax for database interactions.
- **Blade Template Engine**: Facilitates the creation of dynamic views with a lightweight template engine.
- **Routing System**: A simple and flexible system to define application routes.
- **Migration and Seeding**: Tools to manage database schemas and seed data for testing.
- **Authentication**: Robust API authentication using Laravel Passport.

## Project Structure

### Models

Models represent the application's business entities and interact with the database. Each entity has a corresponding model in the `app/Models` directory.

### Views

Views handle the presentation logic and are written in Blade, a Laravel template engine. Views are stored in the `resources/views` directory and include forms, tables, and other UI elements.

### Controllers

Controllers manage the application logic, handle requests, interact with models, and return views. They are located in the `app/Http/Controllers` directory.

### Routing

Routes define the application's URL structure and associate URLs with controller actions. Routes are specified in the `routes/web.php` file and support various request types (GET, POST, PUT, DELETE).

### Migrations

Migrations are PHP scripts that manage the database schema. They are stored in the `database/migrations` directory and can be executed using `php artisan migrate`.

## Database Structure

### Main Entities and Relationships

- **Student**: Tracks student details, attendance records, and associated documents.
- **Professor**: Manages professor information and associated modules and absences.
- **Admin**: Administers the system, managing departments and campuses.
- **Module**: Represents courses, linking professors, students, and attendance records.
- **Attendance**: Records absences and tardiness, including reasons and dates.
- **Campus**: Contains information about each campus and its departments.
- **Department**: Departments within each campus, linking to academic years and administrators.
- **Academic Year**: Represents a specific academic year, including students, modules, and calendars.
- **Calendar**: Manages schedules for modules, linking to academic years and specific days.

## Skills and Qualities Demonstrated

- **Full-Stack Web Development**: Comprehensive experience in front-end and back-end development.
- **Database Management**: Proficient in designing and managing relational databases with MySQL.
- **Framework Proficiency**: Advanced use of Laravel for building scalable and maintainable web applications.
- **Problem-Solving**: Addressing complex attendance management needs with a centralized solution.
- **Collaboration and Communication**: Effective teamwork and communication throughout the project development process.

## Installation

1. Clone the repository:
    
    ```
    git clone https://github.com/yourusername/Attendance-Management-System.git
    
    ```
    
2. Navigate to the project directory:
    
    ```
    cd Attendance-Management-System
    
    ```
    
3. Install dependencies:
    
    ```
    composer install
    npm install
    
    ```
    
4. Set up the environment file:
    
    ```
    cp .env.example .env
    
    ```
    
5. Generate application key:
    
    ```
    php artisan key:generate
    
    ```
    
6. Run database migrations:
    
    ```
    php artisan migrate
    
    ```
    
7. Start the development server:
    
    ```
    php artisan serve
    npm run dev
    
    ```
    

## Usage

- Access the application via `http://localhost:8000`.
- Log in using the provided credentials (set up during seeding or manually added).
- Navigate through the application to manage attendance, generate reports, and more.

## License

This project is licensed under the MIT License. See the [LICENSE](notion://www.notion.so/LICENSE) file for more information.
