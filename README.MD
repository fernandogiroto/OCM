# OCM - Full Stack Technical Challenge

This repository contains the solution for a full-stack technical challenge, which consists of:

1. Fetching data from a public API  
2. Storing this data in a database  
3. Creating a web interface to display the data  
4. Implementing a dynamic search to filter the data  

---

## 📂 Project Structure

```

├── backend/ # API built with Laravel (PHP)
├── frontend/ # Web interface built with Vue 3 (JavaScript)
```



---

## 🧰 Technologies Used

### Backend – Laravel  
- Language: PHP 8.x  
- Framework: Laravel 9  
- Database: MySQL  
- Dependency Manager: Composer  
- Auxiliary Tools:  
  - Eloquent ORM  
  - Laravel HTTP Client (to consume external API)  

### Frontend – Vue 3  
- Language: JavaScript  
- Framework: Vue.js 3 (Composition API)  
- Styling: CSS3 / SASS / BEM  
- Package Manager: NPM  
- Auxiliary Tools:  
  - Axios (to consume the Laravel API)  
  - Reactive dynamic components  

---

## 🚀 How to Run the Project

### Backend (Laravel)

1. Open your terminal and navigate to the backend folder:

```bash
cd backend
```
2. Install PHP dependencies with Composer:
```bash
composer install
```
3. Create a MySQL database for the project.
4. Configure your .env file (copy .env.example if needed) and set your database credentials:
```bash
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```
5. Run migrations to create the database tables:
```bash
php artisan migrate
```
6. Seed the database with initial data fetched from the external API:
```bash
php artisan db:seed
```
7. Start the Laravel development server:
```bash
php artisan db:serve
```
The backend API will be available at http://localhost:8000 (or another port if specified).
Note: If the URL provided by php artisan serve is different from http://localhost:8000,
make sure to update the backend API URL in your frontend .env file accordingly (e.g., VITE_API_BASE_URL=http://localhost:PORT/api).

## 🚀 How to Run the Project

### Frontend (Vue.JS)

1. Open your terminal and navigate to the frontend folder:
```bash
cd frontend
```
2. Install Node.js dependencies:
```bash
npm install
```
3. Run the development server:
```bash
npm run dev
```
The frontend app will be available at http://localhost:5173/ (or the URL shown in your terminal).



## Delivered Features

- Integration with external public API
- Persistent storage of data in database
- RESTful API to provide data to the frontend
- Listing data in a user-friendly interface (table or cards)
- Dynamic search to filter data by relevant fields

---

## Technical Profile
- Fernando Giroto  
- Full-Stack Developer  
- LinkedIn: https://www.linkedin.com/in/fernandogiroto
