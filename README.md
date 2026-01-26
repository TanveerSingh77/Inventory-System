# Inventory Management System (PHP + MySQL)

A web-based inventory management system built using PHP and MySQL for small retail shops to track stock levels.

## Features
- Add and manage products
- Stock IN and Stock OUT management
- Prevent negative stock
- Low stock alerts
- Stock movement history
- Dashboard overview

## Tech Stack
- PHP (Core PHP)
- MySQL
- HTML, CSS
- XAMPP (Local Server)

## Folder Structure
/config      - Database connection & setup
/include     - Header, Footer, Sidebar (layout)
 /css         - Stylesheets
 *.php        - Main application pages

## Setup Instructions
1. Clone the repository
2. Place project in XAMPP htdocs
3. Update DB credentials in config/db.php
4. Run config/setup_tables.php
5. Access via http://localhost/Inventory

## Future Improvements
- User login & authentication
- Role-based access
- Reports & exports
- Better UI

## Problem Statement
Small retail shops often manage inventory manually on paper, which leads to errors, stock mismatches, and lack of visibility on low stock items. This project digitizes inventory management to improve accuracy and efficiency.

## What I Learned
- Designing relational database schemas
- Using prepared statements in PHP (SQL Injection prevention)
- Implementing stock in/out logic
- Handling business rules (preventing negative stock)
- Creating reusable layouts (header, sidebar, footer)
- Version control using Git and GitHub

## Database Tables
- products (id, name, category, current_stock, min_stock)
- stock_movements (id, product_id, type, quantity, date, note)

## Screenshots
<img width="1918" height="917" alt="image" src="https://github.com/user-attachments/assets/b66060f7-cbed-4726-80fb-aa70c6940afb" />
<img width="1919" height="920" alt="image" src="https://github.com/user-attachments/assets/b1c593cb-9bda-4ddf-94f6-e2db742623e5" />
<img width="1919" height="917" alt="image" src="https://github.com/user-attachments/assets/c8829236-e0e6-41c3-8b5e-b7b39c9957a4" />

## Security
- Uses prepared statements to prevent SQL injection
- Server-side validation for stock operations

## Author
Tanveer Singh
