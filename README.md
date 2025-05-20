# 💸 FinanceFlow - Money Tracker App

FinanceFlow is a modern personal finance tracker built using **Laravel**, **Tailwind CSS**, **Chart.js**, and **MySQL**. It helps users manage income, expenses, and savings goals with an intuitive and visually appealing dashboard.

---

## 🚀 Features

### 📊 Dashboard
- **Modern UI:** Clean layout with ample white space and a consistent blue-red-white color theme.
- **Widgets:** Quick overview of account balances, recent transactions, and savings.
- **Interactive Charts:** Weekly income/expense visualizations using Chart.js.

### 💼 My Wallet
- **Card-Based Layout:** Each wallet/account is displayed as a modern card.
- **Balance Display:** Prominently shows balance for each wallet.
- **Transaction List:** Detailed list with filter and sort options.

### 🐷 Piggy Bank
- **Savings Goals:** Create and track multiple savings goals with visual progress bars.
- **Illustrations:** Icons and visuals for an engaging experience.
- **Interactive Elements:** Add/edit goals directly from the UI.

### 📈 Analytics
- **Data Visualization:** Pie charts, bar charts, and line graphs show spending by category, trends, and more.
- **Advanced Filters:** Filter data by date, category, or wallet.
- **Insights:** Tips and recommendations based on your spending patterns.

### ⚙️ Settings
- **User Profile:** Manage personal information.
- **App Preferences:** Customize app appearance and default behavior.
- **Security:** Manage password, 2FA, and privacy settings.

### 🔐 Login / 🔓 Sign Up
- **Minimalist Design:** Clean and simple login/signup UI.
- **Visual Feedback:** Step-by-step signup process with feedback.
- **Social Login:** Login via social platforms (coming soon).
- **Password Recovery:** Easy recovery process for forgotten credentials.

---

## 🧑‍💻 Tech Stack

- **Backend:** [Laravel](https://laravel.com/)
- **Frontend:** [Tailwind CSS](https://tailwindcss.com/)
- **Charts & Graphs:** [Chart.js](https://www.chartjs.org/)
- **Database:** [MySQL](https://www.mysql.com/)

---

## 📸 Screenshots

> Add screenshots or GIFs here showing the dashboard, wallet view, analytics, and more.

---

## 📦 Installation

```bash
# Clone the repository
git clone https://github.com/yourusername/financeflow.git

# Navigate into the project
cd financeflow

# Install dependencies
composer install
npm install

# Create environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in `.env`

# Run migrations
php artisan migrate

# Build assets
npm run dev

# Start the development server
php artisan serve
