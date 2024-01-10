# URL Shortener

A simple URL shortener web application built with Laravel and Vue.js.

## Table of Contents

-   <a href="#prerequisites">Prerequisites </a>
-   <a href="#getting-started">Getting Started </a>
-   <a href="#usage">Usage</a>
-   <a href="#features">Features</a>

## Prerequisites

Make sure you have the following software installed on your machine:

-   PHP (>=7.4)
-   Composer
-   Node.js (>=14)
-   NPM or Yarn
-   MySQL or any other database system of your choice

## Getting Started

1. Clone the repository:

    ```
    git clone https://github.com/nejmiyassine/url-shortener.git
    ```

2. Navigate to the project folder:

    ```
    cd url-shortener
    ```

3. Change branch repositories:

    ```
    git checkout challenge
    ```

4. Install Laravel dependencies:

    ```
    composer install
    ```

5. Copy the example environment file:

    ```
    cp .env.example .env
    ```

6. Configure your database connection in the `.env` file:

    ```
    DB_CONNECTION=mysql
    DB_HOST=your-database-host
    DB_PORT=your-database-port
    DB_DATABASE=your-database-name
    DB_USERNAME=your-database-username
    DB_PASSWORD=your-database-password
    ```

7. Migrate the database:

    ```
      php artisan migrate
    ```

8. Install frontend dependencies:

    ```
    npm install
    ```

## Usage

Start the development server:

```
php artisan serve

npm run dev
```

Visit <http://localhost:8000> in your browser to access the URL shortener application.

## Features

1. **Shorten URL:**

    - Accept a long URL input from the user.
    - Generate a unique short URL for the given long URL.
    - Store the mapping between the short URL and the original long URL.
    - Update the original long URL.

2. **Redirect Users:**

    - Redirect users to the original URL when they access the short URL.

3. **Statistics:**
    - Display a list of previously shortened URLs with their corresponding statistics (e.g., click count).
    - Show basic stats about URL visits, most visited URLs.
