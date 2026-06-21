SCSM2223 Chapter 10 - Complete Books API + Frontend
Project folder name: books-api-mysql

This package contains:
- Backend: PHP Slim 4 + PDO + MySQL
- Frontend: Vue 3 + Vite + Axios + Vue Router

============================================================
BACKEND SETUP
============================================================

1. Copy this folder to:
   C:\laragon\www\books-api-mysql

2. Open Laragon and click:
   Start All

3. Open Laragon Terminal and run:

   cd C:\laragon\www\books-api-mysql
   composer install
   composer dump-autoload
   mysql -u root < sql/schema.sql
   php -S localhost:8000 -t public

4. Keep this backend terminal open.

5. Test backend in browser:
   http://localhost:8000/
   http://localhost:8000/api/books
   http://localhost:8000/api/books?q=clean
   http://localhost:8000/api/books?limit=2

============================================================
FRONTEND SETUP
============================================================

1. Open a NEW terminal.

2. Run:

   cd C:\laragon\www\books-api-mysql\frontend
   npm install
   npm run dev

3. Open the Vite URL shown in terminal, usually:
   http://localhost:5173/

============================================================
DATABASE INFO
============================================================

Database name: books_api
Table name: books
Default Laragon MySQL user: root
Default Laragon MySQL password: empty

The database settings are in:
.env

============================================================
IMPORTANT FILES
============================================================

Backend:
- sql/schema.sql
- .env
- .env.example
- composer.json
- public/index.php
- src/Database.php
- src/routes.php
- src/Controllers/BookController.php
- src/Repositories/BookRepository.php
- src/Middleware/JsonBodyParser.php
- src/Middleware/Cors.php

Frontend:
- frontend/package.json
- frontend/.env.development
- frontend/src/api/client.js
- frontend/src/App.vue
- frontend/src/main.js
- frontend/src/router/index.js
- frontend/src/views/BookList.vue
- frontend/src/views/BookDetail.vue
- frontend/src/views/BookEdit.vue
- frontend/src/style.css

============================================================
CURL TESTS
============================================================

Create:
curl -X POST http://localhost:8000/api/books ^
-H "Content-Type: application/json" ^
-d "{\"title\":\"Refactoring\",\"author\":\"Martin Fowler\",\"year\":2018}"

Update:
curl -X PUT http://localhost:8000/api/books/1 ^
-H "Content-Type: application/json" ^
-d "{\"genre\":\"Software Craftsmanship\"}"

Delete:
curl -X DELETE http://localhost:8000/api/books/2

============================================================
TROUBLESHOOTING
============================================================

If Class App\Database not found:
composer dump-autoload

If SQLSTATE[HY000] [2002] No connection:
Start Laragon MySQL.

If Base table not found:
mysql -u root < sql/schema.sql

If frontend cannot load books:
Make sure backend is running at http://localhost:8000
Check frontend/.env.development:
VITE_API_BASE_URL=http://localhost:8000
