<!-- LOGO & TITLE -->
<p align="center">
  <img src="public/assets/logo.png" alt="Finance Flow Logo" width="180">
</p>

<h1 align="center">💸 FinanceFlow</h1>
<p align="center">
  <b>Personal Money Tracker Website</b><br>
  Built with Laravel · Tailwind CSS · JavaScript · Chart.js · MySQL
</p>

---

<!-- INTRO -->
## ✨ Overview

**FinanceFlow** is a modern and user-friendly personal finance tracker built with **Laravel**, **Tailwind CSS**, **JavaScript**, **Chart.js**, and **MySQL**.

It’s designed to help individuals:
- ✅ Track income & expenses
- ✅ Manage multiple wallets & budgets
- ✅ Set savings goals
- ✅ Visualize financial insights in a sleek dashboard

---

<!-- FEATURES -->
## 🚀 Key Features

### 📊 Dashboard
- Clean, responsive interface with a consistent theme
- Widgets showing balances, spending, and transactions
- Dynamic Chart.js graphs for:
  - Income vs Expenses (1–12 months)
  - Spending per category
  - Budget vs Actual
  - Wallet distributions

### 💼 Wallet
- Stylish card layout for each wallet
- Real-time balance display
- Searchable and filterable transaction list

### 🐷 Piggy Bank
- Visual savings goal tracker
- Animated progress bars and icons
- Easily add/edit goals

### 📈 Analytics
- Pie, bar, and line charts for in-depth analysis
- Filter by time range, category, or wallet
- Smart recommendations based on user habits

### ⚙️ Settings
- Update profile and preferences

### 🔐 Auth System
- Minimalist login and registration UI
- Step-based onboarding
- Email-based password recovery
- **(Coming Soon)** Social login (Google, Facebook)

---

<!-- BUILT WITH -->
## 🧑‍💻 Built With

| Tech       | Description                     |
|------------|---------------------------------|
| [Laravel](https://laravel.com/) | Backend framework |
| [Tailwind CSS](https://tailwindcss.com/) | Utility-first CSS |
| [Chart.js](https://www.chartjs.org/) | Charts and graphs |
| [MySQL](https://www.mysql.com/) | Relational database |

---

## 📸 Screenshots

---

### 🖥️ Dashboard
<p align="center">
  <img src="public/assets/website/dashboard1.png" width="380" alt="Dashboard 1" style="margin: 10px;">
  <img src="public/assets/website/dashboard2.png" width="380" alt="Dashboard 2" style="margin: 10px;">
</p>

---

### 💼 Wallet
<p align="center">
  <img src="public/assets/website/wallets.png" width="500" alt="Wallet" style="margin: 10px;">
</p>

---

### 📄 Transactions & 🗂️ Categories
<p align="center">
  <img src="public/assets/website/transactions.png" width="380" alt="Transactions" style="margin: 10px;">
  <img src="public/assets/website/category.png" width="380" alt="Categories" style="margin: 10px;">
</p>

---

### 📊 Budget & 🐷 Savings
<p align="center">
  <img src="public/assets/website/budget.png" width="380" alt="Budget" style="margin: 10px;">
  <img src="public/assets/website/savings.png" width="380" alt="Savings" style="margin: 10px;">
</p>

---

### 📈 Analytics
<p align="center">
  <img src="public/assets/website/analytics.png" width="380" alt="Analytics 1" style="margin: 10px;">
  <img src="public/assets/website/analytics2.png" width="380" alt="Analytics 2" style="margin: 10px;">
</p>

---

### ⚙️ Settings
<p align="center">
  <img src="public/assets/website/settings.png" width="500" alt="Settings" style="margin: 10px;">
</p>


---

<!-- INSTALLATION -->
## ⚙️ Installation

```bash
# Clone the repository
git clone https://github.com/CJcode6754/FinanceFlow.git

# Navigate into the project
cd FinanceFlow

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy .env and configure
cp .env.example .env

# Generate application key
php artisan key:generate

# Set your DB credentials in `.env`

# Run migrations
php artisan migrate

# Build frontend assets
npm run dev

# Start local server
php artisan serve
