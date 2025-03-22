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

### Local Machine Deployment
1.  Install MongoDB Community Edition
```
sudo apt update 
sudo apt-get install gnupg curl

curl -fsSL https://www.mongodb.org/static/pgp/server-8.0.asc | \
   sudo gpg -o /usr/share/keyrings/mongodb-server-8.0.gpg \
   --dearmor

echo "deb [ arch=amd64,arm64 signed-by=/usr/share/keyrings/mongodb-server-8.0.gpg ] https://repo.mongodb.org/apt/ubuntu noble/mongodb-org/8.0 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-8.0.list

sudo apt-get update

sudo apt-get install -y mongodb-org

```
2. Clone the repository to your local machine.
3. Navigate to the `htdocs` directory and then run command in terminal
```
php -S localhost:8000 
```
4. Visit URL - http://localhost:8000
