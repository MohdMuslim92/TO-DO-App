![To-Do App logo](https://github.com/MohdMuslim92/TO-DO-App/assets/122816330/9b15d1a3-3e31-4c99-8af0-d4d62a44dc73)


# TO-DO App

The Awesome TO-DO App is an intuitive task management application that helps you stay organized and boost your productivity. Whether you're managing personal tasks, work assignments, or team projects, this app has got you covered.

## Features

1. **User-Friendly Interface:** Enjoy a clean and intuitive interface designed for ease of use.

2. **Task Management:** Create, edit, and delete tasks effortlessly.

3. **Due Dates and Reminders:** Set due dates and receive reminders to never miss a deadline.


# Installation
To run TO-DO App locally, you'll need to have Laravel installed. Follow these steps:
## Prerequisites

Make sure you have the following installed:

- [PHP](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [Node.js and npm](https://nodejs.org/en/download/)
- Database (e.g., [MySQL](https://www.mysql.com/downloads/), PostgreSQL, SQLite)

## Steps

1. **Install Laravel:**

   ```bash
   composer global require laravel/installer
   ```

2. **Clone the repository and configure it:**

    ```git clone https://github.com/MohdMuslim92/TO-DO-App.git
    cd TO-DO-App
    composer install
    ```

3. **Install Frontend Dependencies and Vue.js:**

    ```bash
    npm install
    ```

4. **Database Setup:**
    * Create a database for your project.
    * Configure .env with database credentials:

   ```bash
    cp .env.example .env
    ```

    and update the .env file with your config
4. **Run migrations:**

    ```bash
    php artisan migrate
    ```

6. **Start Development Server:**

    ```bash
    php artisan serve
    ```

8. **Compile Assets with Laravel Mix:**

    ```bash
    npm run dev
    ```

# Usage
1. Create a new account or log in if you already have one.

2. Start adding tasks and organizing your to-dos.

# Additional Configuration

## Scheduled Tasks and Queues

To enable the automatic handling of due dates and reminders, the TO-DO App utilizes Laravel's scheduled tasks and queues. Follow these steps to set them up:

### 1. Schedule:Work

Run the following command to start the scheduler, which will handle scheduled tasks:

```bash
php artisan schedule:work
```

This command should be running continuously to ensure scheduled tasks are executed at the specified times, so please keep it running in the background.

### 2. Queue:Work

To handle tasks asynchronously, the app uses Laravel queues. Run the following command to start processing queued jobs:


```bash
php artisan queue:work
```

Make sure to keep this command running as well to process tasks in the background.

## PHP Extension: mbstring

Ensure that the mbstring extension is enabled in your PHP configuration. Open your php.ini file and make sure the following line is uncommented:


```bash
extension=mbstring
```

This extension is necessary for proper string manipulation and handling.

Note: These additional configurations are essential for the complete functionality of the TO-DO App, especially for handling due dates and reminders.

# Contributing
I welcome any suggestions, bug reports, or potential improvements from the community. If you have ideas for enhancements or find any issues, please feel free to:
    - Open an issue in this repository to report bugs or propose new features.
    - Fork the repository and create a pull request with your changes for review and potential inclusion.
    - Contact me through email/LinkedIn/ to discuss potential collaborations or improvements.
Your contributions, feedback, and ideas are appreciated, and they can potentially help improve the To-Do App. Thank you for considering contributing to this project!
