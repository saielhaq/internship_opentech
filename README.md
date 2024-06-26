﻿# Project Documentation

## Overview

This project is a task management system designed for administrative purposes. It includes functionalities such as managing tasks, generating reports, and handling user registrations, specifically for technicians.

## Features

- **User Authentication**: Ensures that only authorized users can access the system.
- **Task Management**: Admins can create, manage, and view tasks in various states (pending, in progress, completed).
- **Technician Management**: Admins can add and manage technicians who are responsible for carrying out tasks.
- **Report Generation**: Generates downloadable PDF reports for tasks.
- **Dashboard**: Provides a summary view of all tasks and their states.

## Detailed File Structure Overview

- `/admin`
  - `download_report.php`: This script is responsible for generating and facilitating the download of reports based on specific IDs provided via GET requests.
  - `admin_dashboard.php`: Serves as the central hub for administrators, providing interfaces and functionalities for managing tasks and technicians.
  - `add_technician.php`: A form-based interface that allows administrators to register new technicians into the system.
- `/includes`
  - `connection.php`: Establishes and maintains the database connection, and includes error handling for failed connections.
  - `/fpdf`
    - Contains the FPDF library files which are utilized for creating PDF versions of reports.
- `/css`
  - `dashboard.css`: Contains specific styles applied to the layout and elements within the admin dashboard.
  - `style.css`: General stylesheet that applies foundational styles across the entire project.
- `/bootstrap`
  - `/css`
    - `bootstrap.min.css`: Compressed version of Bootstrap's CSS, used to style and layout the project with responsive design.
  - `/js`
    - `bootstrap.min.js`: Compressed version of Bootstrap's JavaScript, used for enabling interactive UI components.
- `/js`
  - `jquery-3.7.1.min.js`: Compressed jQuery library, essential for simplifying HTML document traversing, event handling, and Ajax interactions.
- `logout.php`: Manages the termination of user sessions and logs out users securely from the system.

## Technologies Used

- **PHP**: Server-side scripting language used for backend logic.
- **MySQL**: Database used to store user and task data.
- **FPDF**: PHP class extension for generating PDF documents.
- **Bootstrap**: Frontend framework for styling and responsive design.
- **jQuery**: JavaScript library used to simplify HTML DOM tree traversal and manipulation.

## Setup and Installation

1. Clone the repository to your local machine.
2. Set up a MySQL database and import the provided SQL schema.
3. Configure the database connection in `includes/connection.php`.
4. Place the project files on a server with PHP support (e.g., Apache, Nginx).
5. Access the project through the server's public URL.

## Usage

- Navigate to the admin dashboard to view and manage tasks.
- Use the sidebar to add technicians, manage tasks, or generate reports.
- Reports can be downloaded by selecting a specific task and choosing the download option.

## Contributing

Contributions to this project are welcome. Please fork the repository and submit a pull request with your changes. If you find this project helpful, consider giving it a star on GitHub!

## License

This project is licensed under the MIT License - see the LICENSE file for details.
