API Development Assignment - README
Introduction
This assignment centers on the creation of APIs to manage various data entities such as student information, products, and categories for an online store. The task involves using both PHP and Laravel frameworks to implement the required functionalities. Below is a detailed guide of the activities and steps for developing the corresponding APIs.

Activity 1: Student Information Representation (XML and JSON)
Create XML and JSON Structures for Student Information
You will need to create an XML document and a JSON object to represent a student with the following attributes:

Name
Age
Gender
A list of subjects the student is enrolled in, with each subject having:
Subject Name
Grade
XQuery Expressions
Write XQuery expressions to carry out the following tasks:

Retrieve the student's name and age.
Retrieve the names of the subjects the student is enrolled in.
Activity 2: Simple API for Managing Products (PHP)
API Functionality
Develop the following API endpoints to manage product data:

GET /products: Retrieve all available products.
GET /products/{id}: Retrieve details of a specific product by its ID.
POST /products: Add a new product.
PUT /products/{id}: Update an existing product by its ID.
DELETE /products/{id}: Delete a product by its ID.
Product Data Model
Each product should include the following attributes:

ID
Name
Description
Price
For simplicity, product data will be stored in a PHP array. The API will return responses in JSON format.

Activity 3: Online Store Category Management API (Laravel)
Database Setup
Set up a MySQL database named "online_store".
Create a categories table with the following columns:
id
name
lft
rgt
created_at
updated_at
Nested Set Model
Implement the Nested Set Model to manage the hierarchical structure of categories using Laravel’s Eloquent ORM.

API Routes
Define the following routes for category management:

GET /categories: Retrieve all categories in XML format.
GET /categories/{id}: Retrieve a specific category by its ID in XML format.
POST /categories: Add a new category (accepts XML with name and parent_id fields).
PUT /categories/{id}: Update an existing category (accepts XML with name).
DELETE /categories/{id}: Delete a category and return a success message in XML format.
Error Handling & Validation
Implement proper error handling for invalid requests, returning appropriate XML error responses.
Use Laravel routing, controllers, and models to implement the necessary logic for these endpoints.
Unit Testing
Develop unit tests to ensure the correct behavior and functionality of each API endpoint.

Activity 4: Develop APIs for Your Project - Laravel Bank System
Overview
This banking system, built with Laravel, provides key banking functions such as account creation, deposits, withdrawals, and more.

System Requirements
Make sure the following software is installed on your system:

PHP (version 8.0 or above)
Composer
MySQL (or an alternative database of your choice)
Laravel (version 9 or higher)
Node.js and NPM (for frontend asset management)
Installation Instructions
Clone the Repository

Clone or download the project files from the provided repository.
Install Dependencies

Run the command composer install to set up the necessary backend dependencies.
Configure Environment File

Copy the .env.example file to .env and configure your database connection settings.
Generate Application Key

Execute php artisan key:generate to generate the Laravel application encryption key.
Run Migrations and Seed Data

Use php artisan migrate to create the database tables and php artisan db:seed to populate them with default values.
Start the Development Server

Run php artisan serve to start the server and access the application locally.
Frontend Setup
Install Node.js Dependencies

Run npm install to install the necessary frontend packages.
Compile Frontend Assets

Use npm run dev to compile and optimize frontend CSS and JavaScript files.
API Documentation
The API can be tested using Postman or Swagger.
Swagger will automatically generate API documentation, accessible through a specific URL.
Running Tests
Automated tests are included in the application and can be executed with the following command:

php artisan test to verify the correct functionality of the backend.
