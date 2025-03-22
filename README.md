# Full Stack Notes Web Application

## Overview
This project is a Full Stack Notes Web Application that allows users to create, read, update, and delete notes. It features user authentication and a modern, responsive UI built with HTML, CSS, JavaScript, and Bootstrap. The backend is developed using PHP with MongoDB as the database.

## Project Structure
```
notes-web-app
├── workspace
│   ├── src
│   │   ├── js
│   │   │   ├── app.js
│   │   │   ├── auth.js
│   │   │   └── notes.js
│   │   ├── css
│   │   │   ├── style.css
│   │   │   └── responsive.css
│   │   └── assets
│   │       └── icons
│   ├── vendor
│   │   └── fingerprint
│   └── api
│       ├── classes
│       │   ├── Database.php
│       │   ├── User.php
│       │   └── Note.php
│       ├── config
│       │   └── db_config.php
│       └── endpoints
│           ├── auth
│           │   ├── login.php
│           │   ├── logout.php
│           │   └── register.php
│           └── notes
│               ├── create.php
│               ├── delete.php
│               ├── read.php
│               └── update.php
├── htdocs
│   ├── index.html
│   ├── login.html
│   ├── register.html
│   ├── dashboard.html
│   ├── js
│   ├── css
│   └── api
├── mongodb
│   └── schemas
│       ├── users.json
│       └── notes.json
├── README.md
└── .gitignore
```

## Technologies Used
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP (OOP)
- **Database:** MongoDB
- **Session Management:** Fingerprint.js for session manipulation prevention

## Features
- User registration and login
- Create, read, update, and delete notes
- Responsive design for mobile and desktop
- Secure file and image uploads
- Defensive programming techniques to handle user input

## Setup Instructions

### Prerequisites
- PHP installed on your local machine
- MongoDB installed and running
- Apache server for hosting the application

### Installation
1. Clone the repository to your local machine.
2. Navigate to the `workspace` directory.
3. Set up the MongoDB database and import the schemas located in `mongodb/schemas/`.
4. Configure the database connection in `workspace/api/config/db_config.php`.
5. Start the Apache server and point it to the `htdocs` directory.

### Running the Application
- Open your web browser and navigate to `http://localhost/index.html` to access the application.

## Live Deployment
The application is deployed on a live server. You can access it at the following URL: [Your Live Site URL]
