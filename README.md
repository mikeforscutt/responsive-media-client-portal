# 🖥️ Responsive Media – Client & Project Portal
*A clean Laravel-based dashboard for managing clients, projects, and recurring revenue.*

![Screenshot](docs/screenshot-dashboard.png)

## 🚀 Overview
Responsive Media Client Portal is a lightweight internal tool for managing:

- Clients  
- Projects  
- Project statuses  
- Monthly recurring revenue  
- Dashboard insights  
- Recent activity  

It’s built as a modern Laravel application with a clean Tailwind UI, Breeze authentication, and a simple relational structure that demonstrates full CRUD, routing, controllers, Eloquent relationships, and dashboard metrics — ideal as a portfolio project or internal agency tool.

---

## ✨ Features

### 👤 Client Management
- Add, edit, and delete clients  
- Store company info, website URL, email, and notes  
- View all projects belonging to a client  

### 📁 Project Management
- Add, edit, and delete projects  
- Project statuses (planned, in progress, live, on hold)  
- Tech stack fields  
- Monthly fee tracking  
- Linked directly to a client  

### 📊 Dashboard Insights
- Total clients  
- Total projects  
- Live project count  
- Monthly recurring revenue (MRR)  
- Recent activity table  

### 🧪 Demo Seed Data  
The system includes realistic demo data using:

- Model factories  
- A `DemoDataSeeder`  
- Randomised projects/clients  
- Helpful for testing or live demos  

---

## 🛠️ Tech Stack

- **Laravel 12**  
- **PHP 8.4**  
- **Breeze (Blade)** for auth scaffolding  
- **TailwindCSS** for UI  
- **Vite** for asset bundling  
- **Eloquent ORM**  
- **SQLite** (default) or MySQL  

---

## 📂 Project Structure

app/
├── Http/Controllers
├── Models
├── Providers
database/
├── factories/
├── migrations/
└── seeders/
resources/
├── views/
└── css/js/
routes/
└── web.php

## 🔧 Installation

Clone the repo:

```bash
git clone https://github.com/mikeforscutt/responsive-media-client-portal.git
cd responsive-media-client-portal