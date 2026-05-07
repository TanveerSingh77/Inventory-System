# Inventory Management System (PHP + MySQL)

A web-based Inventory Management System developed using PHP and MySQL to help small retail businesses efficiently manage stock, monitor inventory movement, and reduce manual inventory errors.

---

# Project Overview

Small retail shops often rely on manual inventory tracking methods, which can lead to:
- Stock mismatches
- Human errors
- Difficulty tracking inventory movement
- Poor visibility of low-stock items

This project digitizes the inventory management process by providing a simple and structured web application for managing products and stock operations.

---

# Key Features

- Add, update, and manage products
- Stock IN and Stock OUT functionality
- Prevent negative stock transactions
- Low stock alert system
- Track stock movement history
- Dashboard overview for inventory monitoring
- Server-side validation for secure stock operations

---

# Tech Stack

- PHP (Core PHP)
- MySQL
- HTML5
- CSS3
- XAMPP (Apache + MySQL)

---

# Skills Demonstrated

- Backend development using PHP
- Relational database design
- CRUD operations
- SQL query handling
- Prepared statements for SQL injection prevention
- Business logic implementation
- Inventory flow management
- Reusable UI layout structure
- Version control using Git & GitHub

---

# Folder Structure

```bash
/config       → Database connection and setup
/include      → Header, Footer, Sidebar layout files
/css          → Stylesheets
*.php         → Main application pages
```

---

# Database Design

### products
| Column | Description |
|---|---|
| id | Product ID |
| name | Product Name |
| category | Product Category |
| current_stock | Available Stock |
| min_stock | Minimum Stock Threshold |

### stock_movements
| Column | Description |
|---|---|
| id | Movement ID |
| product_id | Linked Product ID |
| type | IN / OUT |
| quantity | Stock Quantity |
| date | Transaction Date |
| note | Additional Notes |

---

# Setup Instructions

1. Clone the repository
2. Move the project folder to XAMPP `htdocs`
3. Configure database credentials in:

```bash
config/db.php
```

4. Run the setup file:

```bash
config/setup_tables.php
```

5. Open the project in browser:

```bash
http://localhost/Inventory
```

---

# Security Features

- Prepared statements to prevent SQL Injection
- Server-side validation for stock operations
- Prevents invalid negative stock transactions

---

# Future Improvements

- User Authentication System
- Role-Based Access Control
- Export Reports (PDF/Excel)
- Advanced Dashboard Analytics
- Improved UI/UX Design
- Search & Filter Functionality

---

# Project Screenshots

<img width="1918" height="917" alt="Dashboard" src="https://github.com/user-attachments/assets/b66060f7-cbed-4726-80fb-aa70c6940afb" />

<img width="1919" height="920" alt="Products" src="https://github.com/user-attachments/assets/b1c593cb-9bda-4ddf-94f6-e2db742623e5" />

<img width="1919" height="917" alt="Stock Movement" src="https://github.com/user-attachments/assets/c8829236-e0e6-41c3-8b5e-b7b39c9957a4" />

<img width="1919" height="916" alt="Inventory Management" src="https://github.com/user-attachments/assets/1fc2f956-ae2b-40f4-a7c5-28c55adf025f" />

---

# Demo Video

Watch the complete project demonstration here:

[Inventory Management System Demo Video](https://drive.google.com/file/d/1zf550Oxnat5h6uqlWcnrkJXIip_76nf2/view?usp=sharing&utm_source=chatgpt.com)

---

# What I Learned

Through this project, I gained hands-on experience in:
- Designing normalized database schemas
- Managing stock transactions logically
- Writing secure SQL queries
- Structuring PHP projects professionally
- Building reusable components
- Applying backend validation and business rules

---

# Let's Connect

Email: [tanveer.gulati2006@gmail.com](mailto:tanveer.gulati2006@gmail.com)

LinkedIn:  
[Tanveer Singh Gulati LinkedIn](https://www.linkedin.com/in/tanveer-singh-gulati/?utm_source=chatgpt.com)
