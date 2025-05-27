<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="{{asset('assets/logo.png')}}" width="400" alt="Laravel Logo">
    <p>Finance Flow</p>
  </a>
</p>

# 💸 FinanceFlow - Personal Money Tracker App

**FinanceFlow** is a modern and user-friendly personal finance tracker built with **Laravel**, **Tailwind CSS**, **Chart.js**, and **MySQL**. Designed to help individuals manage income, track expenses, monitor savings goals, and gain insights through a beautifully crafted dashboard and analytics.

---

## 🚀 Key Features

### 📊 Dashboard
- **Modern UI**: Clean, responsive interface with a consistent blue-red-white color theme.
- **At-a-Glance Widgets**: Get a quick overview of your account balances, spending, and recent transactions.
- **Interactive Charts**: Visualize your weekly income and expenses using dynamic Chart.js graphs.

### 💼 My Wallet
- **Card-Based Layout**: Wallets and accounts are displayed in stylish cards for easy access.
- **Real-Time Balance Display**: View up-to-date balances for each wallet.
- **Detailed Transactions**: Browse, filter, and sort recent transactions efficiently.

### 🐷 Piggy Bank
- **Savings Goal Tracking**: Set financial goals and monitor progress with visual progress bars.
- **Engaging Illustrations**: Icons and visuals make saving more enjoyable.
- **Interactive UI**: Add, edit, and manage goals directly from the interface.

### 📈 Analytics
- **Powerful Data Visualization**: Use pie, bar, and line charts to analyze your financial habits.
- **Smart Filters**: Customize views by date range, category, or specific wallets.
- **Insights & Recommendations**: Get helpful tips based on your financial behavior.

### ⚙️ Settings
- **User Profile Management**: Edit personal details and update profile info.
- **App Customization**: Modify UI preferences and default behaviors.
- **Privacy & Security**: Configure password settings, enable 2FA, and manage data privacy.

### 🔐 Login & 🔓 Sign Up
- **Minimalist Design**: Clean, modern login and registration screens.
- **Step-by-Step Registration**: Guide users through signup with helpful progress indicators.
- **Social Authentication**: (Coming Soon) Sign in with Google, Facebook, etc.
- **Password Recovery**: Easily reset forgotten passwords via email.

---

## 🧑‍💻 Built With

- **Backend**: [Laravel](https://laravel.com/)
- **Frontend**: [Tailwind CSS](https://tailwindcss.com/)
- **Charts & Graphs**: [Chart.js](https://www.chartjs.org/)
- **Database**: [MySQL](https://www.mysql.com/)

---

## 📸 Screenshots

> _Add high-quality screenshots or animated GIFs showcasing the dashboard, wallet, piggy bank, and analytics pages._

---

## ⚙️ Installation

```bash
# Clone the repository
git clone https://github.com/CJcode6754/FinanceFlow.git

# Navigate to the project folder
cd financeflow

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Copy environment file and set up environment variables
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database connection in `.env`

# Run database migrations
php artisan migrate

# Build frontend assets
npm run dev

# Start the development server
php artisan serve
