# 💸 Expense Tracker (PHP + MySQL)

A colorful and simple web-based Expense Tracker system built using PHP, MySQL, HTML, CSS, and JavaScript (with Chart.js). This project helps users track their incomes and expenses, view them in a table, and visualize monthly financial reports using dynamic charts.

---

## 📌 Features

- 🔐 User Authentication (Register, Login, Logout)
- ➕ Add Income and Expense Entries
- 📋 View All Transactions in Table Format
- 📆 Monthly Bar Chart Report (Income vs Expense)
- 📊 Dashboard with Total Balance Summary
- 🎨 Colorful UI (No Bootstrap Used)
- ✅ Simple and easy-to-use interface

---

## 🧑‍💻 Technologies Used

- Frontend: HTML, CSS, JavaScript (Chart.js)
- Backend: PHP (Core PHP, no frameworks)
- Database: MySQL
- Tools: XAMPP / phpMyAdmin

---

## 📂 Project Structure

Expense-Tracker/
│
├── css/                    # Custom styles
│   └── style.css
│
├── includes/               # Reusable PHP code
│   └── db.php              # DB connection
│
├── assets/                 # Images, JS libraries
│   └── chart.min.js (or use CDN)
│
├── register.php            # New user registration
├── login.php               # User login
├── logout.php              # Session destroy
├── dashboard.php           # User dashboard
├── add_expense.php         # Add income/expense
├── view_expense.php        # Table view of entries
├── monthly_report.php      # Monthly chart report
└── index.php               # Redirect to login/dashboard

---

## ⚙️ How to Run This Project Locally

1. Install XAMPP (or any local PHP server)
2. Clone or download this project into your XAMPP `htdocs` folder
3. Start Apache and MySQL from the XAMPP control panel
4. Open http://localhost/phpmyadmin in your browser
5. Create a new database named: `expense_tracker`
6. Import the provided `expense_tracker.sql` file into the database
7. Make sure the DB connection settings in `includes/db.php` match your environment
8. Open http://localhost/Expense-Tracker in your browser and start using the app!

---

## 📎 Viva / Oral Notes (For Students)

- **Why this project?**  
  It's practical, covers all key web tech topics, and useful in daily life.

- **Which technologies used?**  
  HTML, CSS, JS (Chart.js), PHP, MySQL – aligns with WT syllabus.

- **Where are Servlets / JSP / ASP.NET?**  
  This version uses PHP only. Can be extended with other stacks if required.

---

## 📃 License

This project is open-source and free to use for learning and academic purposes.
