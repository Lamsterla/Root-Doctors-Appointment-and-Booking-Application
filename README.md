# 🩺 HealthCare+ | Premium Doctor & Hospital Appointment Platform

A modern, responsive, and standalone PHP-based patient portal and appointment scheduling platform. **HealthCare+** provides an intuitive interface for patients to search for specialist doctors, check their ratings and reviews, manage their medical insurance configurations, schedule appointments, and consult with a virtual AI symptom assistant.

---

## 🚀 Core Features

### 🌐 Patient Landing Page (`index.php`)
* **Responsive UI:** Clean, contemporary Tailwind CSS design with smooth micro-interactions.
* **Specialist Search:** Quick search function to query doctors by name, specialty, or location.
* **Featured Services:** Quick-access service highlights including Cardiology, Radiology, Pediatrics, General Surgery, Dentistry, and Mental Health.

### 🔐 Secure Authentication (`login.php` & `signin.php`)
* **Seamless Login (HealSync):** Includes visual sidebar branding, forms validation, keyboard shortcuts, and a local mock demo mode (`demo@example.com` / `password`).
* **Validation-Rich Onboarding (HealConnect):** Complete server-side validation for:
  * Full name length constraints.
  * Formatted email syntax checks.
  * Multi-region phone numbers (supporting 🇮🇳 India `+91`, 🇺🇸/🇨🇦 US/Canada `+1`, 🇬🇧 UK `+44`, 🇦🇺 Australia `+61`, and 🇦🇪 UAE `+971`).
  * Strong password enforcement (8+ characters, uppercase, lowercase, numbers).
* **Google Identity Services:** Integrated Google Sign-In button library support.

### 📊 Interactive Patient Dashboard (`main.php`)
* **Dynamic Sidebar Filters:** Refine doctor listings dynamically based on accepted insurance policies (e.g. Star Health, HDFC ERGO, etc.), distance parameters, and availability.
* **Appointment Manager:** Real-time dashboard to schedule, review, or cancel upcoming appointments with instant banner notifications.
* **AI Symptom Chatbot:** A virtual health assistant that suggests relevant specialists (e.g., Neurologists for headaches, Cardiologists for chest pain) based on user-typed symptoms.
* **Portability (Session-based Data):** Stores doctor lists, notifications, upcoming bookings, and chat logs inside PHP `$_SESSION` arrays, making it runnable out-of-the-box without strict database setup dependencies.

---

## 📁 Project Structure

```text
c:\xampp\htdocs\root\
├── .env                # App & Database environment variables (Git-ignored)
├── .gitignore          # Git exclusion rules
├── README.md           # Project documentation (this file)
└── pages/              # Application source files
    ├── config.php      # Database connection handler using MySQLi
    ├── index.php       # Landing and search gateway (HealthCare+)
    ├── login.php       # Patient authentication portal (HealSync)
    ├── signin.php      # Patient registration portal (HealConnect)
    └── main.php        # Core portal, filtering dashboard & AI Assistant
```

---

## 💻 Installation & Setup

1. **Prerequisites:** Install [XAMPP](https://www.apachefriends.org/) (or any PHP environment supporting Apache + MySQL).
2. **Repository Placement:** Clone or copy this repository into your XAMPP document root:
   ```bash
   C:\xampp\htdocs\root
   ```
3. **Database Configuration:**
   * Create a MySQL database named `my`.
   * Ensure a database user exists matching the configuration in your database setup, and configure your credentials accordingly.
4. **Run Application:** Start Apache and MySQL via the XAMPP Control Panel, then access the app in your browser:
   ```text
   http://localhost/root/pages/index.php
   ```

---

## ✍️ Author

* **Arun Sah** - *Developer*

