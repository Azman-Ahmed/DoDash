# DoDash

A simple and elegant to-do list application built with Laravel.

## Features

- User authentication (Login/Registration)
- Manage tasks: Create, Edit, View, and Delete
- Task status tracking
- User profile management
- Application settings

## Pages

- **Home**: Welcome page with an overview of the application.
- **Log In**: User login page.
- **Registration**: User registration page.
- **Task List Page**: Displays all tasks associated with the user.
- **Create Task**: Form to add a new task.
- **Edit Task**: Form to modify an existing task.
- **View Task**: Detailed view of a selected task.
- **Profile**: User profile information.
- **Settings**: Application settings for user customization.

## Database Structure

### User Table

| Column      | Type        |
|-------------|-------------|
| **id**      | Integer     |
| **name**    | String      |
| **email**   | String      |
| **password**| String      |
| **created_at** | Timestamp |
| **updated_at** | Timestamp |

### Task Table

| Column       | Type        |
|--------------|-------------|
| **id**       | Integer     |
| **user_id**  | Integer     |
| **title**    | String      |
| **description** | Text      |
| **due_date** | Date        |
| **status**   | String      |
| **created_at** | Timestamp  |
| **updated_at** | Timestamp  |

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Azman-Ahmed/DoDash.git
   cd dodash
   ```

## Creation of the Project
```bash
composer create-project laravel/laravel DoDash
```

## Install Jetstream

``bash
composer require laravel/Jetstream
php artisan jetstream:install livewire
``

## Make model and migration file
``bash
php artisan make:model Dash -m
``
## add the all the attribute for the dash table which is our task table

``bash
php artisan make:factory DashFactory --model = Dash
``

## MIgrate and seed it
``bash
php artisan make:migrate
php artisan migrate:refresh --seed
``

## Create the CRUD view files under dash folder in views (index, create, show, edit)
## Update the router(web.php accordigly)
## complete the cycle from one page to another page, keep no loose end

if I give dash/{obj} in web.php and in controller i get it like this ( Dash $dash) and then use $dash-id in show
why does give me error, I want explanation not code 

Fix: Use Consistent Names
For route model binding to work seamlessly, the name of the route parameter must match the variable in the controller or you must define an explicit binding. Otherwise, Laravel can't resolve the model automatically, and you get errors.

In your case, the error happens because the route is using {obj}, but the controller expects the model under $dash.

### DoDash
