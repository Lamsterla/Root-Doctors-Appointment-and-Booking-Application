<?php
session_start();
include 'config.php';
$errors = [];
$success = '';
$full_name = $email = $phone = '';
$country_code = '+91';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if it's a Google OAuth request
    if (isset($_POST['google_token'])) {
        // Process Google Sign-In
        $google_token = $_POST['google_token'];
        
        // Initialize Google Client
        $client = new Google_Client(['client_id' => 'YOUR_GOOGLE_CLIENT_ID']);
        try {
            $payload = $client->verifyIdToken($google_token);
            if ($payload) {
                $google_email = $payload['email'];
                $google_name = $payload['name'];
                $google_picture = $payload['picture'] ?? '';
                
                // Check if user exists in your database
                // For demo purposes, we'll simulate successful login
                
                // Set session variables for Google user
                $_SESSION['user_id'] = uniqid();
                $_SESSION['user_name'] = $google_name;
                $_SESSION['user_email'] = $google_email;
                $_SESSION['user_google'] = true;
                $_SESSION['logged_in'] = true;
                
                // Set success message
                $success = 'Google Sign-In successful! Redirecting to dashboard...';
                
                // In real implementation, you would redirect to dashboard
                // header("Location: dashboard.php");
                // exit();
            } else {
                $errors['google'] = 'Invalid Google token';
            }
        } catch (Exception $e) {
            $errors['google'] = 'Google authentication failed: ' . $e->getMessage();
        }
    } else {
        // Process regular form submission
        // Sanitize and validate inputs
        $full_name = trim($_POST['full_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $country_code = $_POST['country_code'] ?? '+91';
        $phone = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';
        $terms = isset($_POST['terms']);
        
        // Validation
        if (empty($full_name)) {
            $errors['full_name'] = 'Full name is required';
        } elseif (strlen($full_name) < 2) {
            $errors['full_name'] = 'Full name must be at least 2 characters';
        }
        
        if (empty($email)) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address';
        }
        
        // Phone validation with country code
        if (empty($phone)) {
            $errors['phone'] = 'Phone number is required';
        } else {
            // Remove all non-digit characters
            $cleanPhone = preg_replace('/\D/', '', $phone);
            
            if ($country_code === '+91') {
                // India specific validation: exactly 10 digits starting with 6-9
                if (strlen($cleanPhone) !== 10) {
                    $errors['phone'] = "Indian phone number must be exactly 10 digits";
                } elseif (!preg_match('/^[6-9]\d{9}$/', $cleanPhone)) {
                    $errors['phone'] = "Please enter a valid Indian mobile number (must start with 6,7,8,9)";
                } else {
                    // Format the phone number for display/storage
                    $phone = $cleanPhone;
                }
            } elseif ($country_code === '+1') {
                // US/Canada: 10 digits
                if (strlen($cleanPhone) !== 10) {
                    $errors['phone'] = "US/Canada phone number must be 10 digits";
                } else {
                    $phone = $cleanPhone;
                }
            } elseif ($country_code === '+44') {
                // UK: 10-11 digits
                if (strlen($cleanPhone) < 10 || strlen($cleanPhone) > 11) {
                    $errors['phone'] = "UK phone number must be 10-11 digits";
                } else {
                    $phone = $cleanPhone;
                }
            } elseif ($country_code === '+61') {
                // Australia: 9 digits
                if (strlen($cleanPhone) !== 9) {
                    $errors['phone'] = "Australian phone number must be 9 digits";
                } else {
                    $phone = $cleanPhone;
                }
            } elseif ($country_code === '+971') {
                // UAE: 9 digits
                if (strlen($cleanPhone) !== 9) {
                    $errors['phone'] = "UAE phone number must be 9 digits";
                } else {
                    $phone = $cleanPhone;
                }
            } else {
                // Generic validation for other countries
                if (strlen($cleanPhone) < 5) {
                    $errors['phone'] = "Please enter a valid phone number";
                } else {
                    $phone = $cleanPhone;
                }
            }
        }
        
        if (empty($password)) {
            $errors['password'] = 'Password is required';
        } elseif (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters';
        } elseif (!preg_match('/[A-Z]/', $password)) {
            $errors['password'] = 'Password must contain at least one uppercase letter';
        } elseif (!preg_match('/[a-z]/', $password)) {
            $errors['password'] = 'Password must contain at least one lowercase letter';
        } elseif (!preg_match('/[0-9]/', $password)) {
            $errors['password'] = 'Password must contain at least one number';
        }
        
        if (!$terms) {
            $errors['terms'] = 'You must agree to the terms and conditions';
        }
        
        // If no errors, simulate successful registration
        if (empty($errors)) {
            // Store phone number with country code for display
            $_SESSION['user_phone'] = $country_code . ' ' . $phone;
            
            // Set session variables for demo
            $_SESSION['user_id'] = uniqid();
            $_SESSION['user_name'] = $full_name;
            $_SESSION['user_email'] = $email;
            $_SESSION['logged_in'] = true;
            
            // Set success message
            $success = 'Registration successful! Redirecting to dashboard...';
        }
    }
}
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Join HealConnect | Healthcare Registration</title>
    <!-- Google Sign-In Client Library -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": {
                            DEFAULT: "#0a7d8f",
                            50: "#eff9fb",
                            100: "#d7f0f5",
                            500: "#0a7d8f",
                            600: "#086b7a",
                            700: "#065865"
                        },
                        "background-light": "#f8fafc",
                        "background-dark": "#1e293b",
                        "gray-light": "#f1f5f9",
                        "gray-border": "#e2e8f0"
                    },
                    fontFamily: {
                        "display": ["Manrope", "system-ui", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.75rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                    boxShadow: {
                        'soft': '0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05)',
                        'medium': '0 10px 15px -3px rgb(0 0 0 / 0.07), 0 4px 6px -4px rgb(0 0 0 / 0.07)',
                        'inner-light': 'inset 0 2px 4px 0 rgb(0 0 0 / 0.03)'
                    }
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #0a7d8f 0%, #086b7a 100%);
        }
        .form-input {
            transition: all 0.2s ease;
        }
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(10, 125, 143, 0.1);
            border-color: #0a7d8f;
        }
        .floating-label {
            position: absolute;
            left: 12px;
            top: -8px;
            background: white;
            padding: 0 6px;
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
            z-index: 10;
        }
        .dark .floating-label {
            background: #1e293b;
        }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }
        .error-message {
            color: #ef4444;
            font-size: 0.8125rem;
            margin-top: 0.25rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .success-message {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border: none;
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2);
        }
        .error-field {
            border-color: #ef4444 !important;
            background-color: #fef2f2;
        }
        .dark .error-field {
            background-color: #1f2937;
        }
        .password-strength-bar {
            transition: width 0.3s ease;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .animate-pulse-slow {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        /* Google Sign-In Button Styles */
        .gsi-material-button {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -webkit-appearance: none;
            background-color: WHITE;
            background-image: none;
            border: 1px solid #747775;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #1f1f1f;
            cursor: pointer;
            font-family: 'Roboto', arial, sans-serif;
            font-size: 14px;
            height: 48px;
            letter-spacing: 0.25px;
            outline: none;
            overflow: hidden;
            padding: 0 12px;
            position: relative;
            text-align: center;
            -webkit-transition: background-color .218s, border-color .218s, box-shadow .218s;
            transition: background-color .218s, border-color .218s, box-shadow .218s;
            vertical-align: middle;
            white-space: nowrap;
            width: auto;
            max-width: 400px;
            min-width: min-content;
        }
        
        .gsi-material-button .gsi-material-button-icon {
            height: 20px;
            margin-right: 12px;
            min-width: 20px;
            width: 20px;
        }
        
        .gsi-material-button .gsi-material-button-content-wrapper {
            -webkit-align-items: center;
            align-items: center;
            display: flex;
            -webkit-flex-direction: row;
            flex-direction: row;
            -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
            height: 100%;
            justify-content: space-between;
            position: relative;
            width: 100%;
        }
        
        .gsi-material-button .gsi-material-button-contents {
            -webkit-flex-grow: 1;
            flex-grow: 1;
            font-family: 'Roboto', arial, sans-serif;
            font-weight: 500;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: top;
        }
        
        .gsi-material-button .gsi-material-button-state {
            -webkit-transition: opacity .218s;
            transition: opacity .218s;
            bottom: 0;
            left: 0;
            opacity: 0;
            position: absolute;
            right: 0;
            top: 0;
        }
        
        .gsi-material-button:disabled {
            cursor: default;
            background-color: #ffffff61;
            border-color: #1f1f1f1f;
        }
        
        .gsi-material-button:disabled .gsi-material-button-contents {
            opacity: 38%;
        }
        
        .gsi-material-button:disabled .gsi-material-button-icon {
            opacity: 38%;
        }
        
        .gsi-material-button:not(:disabled):active .gsi-material-button-state, 
        .gsi-material-button:not(:disabled):focus .gsi-material-button-state {
            background-color: #303030;
            opacity: 12%;
        }
        
        .gsi-material-button:not(:disabled):hover {
            -webkit-box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
        }
        
        .gsi-material-button:not(:disabled):hover .gsi-material-button-state {
            background-color: #303030;
            opacity: 8%;
        }
        
        /* Custom select arrow */
        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1em;
            padding-right: 2.5rem;
        }
        .dark select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-gray-light dark:bg-background-dark min-h-screen font-display text-slate-800 dark:text-slate-100">
<div class="flex flex-col lg:flex-row min-h-screen">
    <!-- Left Visual Panel - Enhanced -->
    <div class="hidden lg:flex lg:w-2/5 relative flex-col justify-between p-12 gradient-bg overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/5 rounded-full"></div>
            <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-white/10 rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/3 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-12">
                <div class="size-12 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center border border-white/30">
                    <svg class="text-white size-7" fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z" fill="currentColor" fill-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">HealConnect</h1>
                    <p class="text-sm text-white/80">Health Management Platform</p>
                </div>
            </div>
            
            <div class="max-w-md">
                <h2 class="text-4xl font-extrabold leading-tight mb-6 text-white">
                    Your health journey starts here
                </h2>
                <p class="text-lg text-white/90 mb-8 leading-relaxed">
                    Join thousands who trust HealConnect for their healthcare needs. Access medical records, book appointments, and connect with professionals.
                </p>
                
                <!-- Features List -->
                <div class="space-y-4 mb-10">
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-full bg-white/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-sm">check</span>
                        </div>
                        <span class="text-white/90 font-medium">Secure & HIPAA compliant</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-full bg-white/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-sm">check</span>
                        </div>
                        <span class="text-white/90 font-medium">24/7 Virtual consultations</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-full bg-white/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-sm">check</span>
                        </div>
                        <span class="text-white/90 font-medium">Prescription management</span>
                    </div>
                </div>
                
                <!-- Testimonial -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <p class="text-white/90 italic mb-4">"HealConnect made managing my family's health so much easier. The interface is intuitive and the service is reliable."</p>
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full bg-white/20"></div>
                        <div>
                            <p class="text-white font-medium">Sarah Johnson</p>
                            <p class="text-white/70 text-sm">Patient since 2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="relative z-10 mt-12">
            <p class="text-white/80 mb-2">Already have an account?</p>
            <a class="inline-flex items-center gap-2 text-white font-semibold hover:text-white/90 transition-colors group" href="login.php">
                Sign In to HealConnect
                <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
    </div>
    
    <!-- Right Form Panel - Enhanced -->
    <div class="flex-1 flex flex-col justify-center items-center p-6 md:p-8 lg:p-12">
        <div class="w-full max-w-md">
            <!-- Mobile Header -->
            <div class="lg:hidden mb-10">
                <div class="flex items-center gap-3 mb-6">
                    <div class="size-10 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="text-primary size-6" fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z" fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-slate-800 dark:text-white">HealConnect</h1>
                        <p class="text-sm text-slate-600 dark:text-slate-300">Health Management Platform</p>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-slate-800 dark:text-white mb-3">Create Account</h2>
                <p class="text-slate-600 dark:text-slate-400">Join our healthcare community in minutes</p>
            </div>
            
            <!-- Desktop Header -->
            <div class="hidden lg:block mb-10">
                <h2 class="text-3xl font-bold text-slate-800 dark:text-white mb-3">Create Your Account</h2>
                <p class="text-slate-600 dark:text-slate-400">Fill in your details to get started with HealConnect</p>
            </div>
            
            <!-- Success Message -->
            <?php if ($success): ?>
                <div class="mb-6 p-4 rounded-xl success-message flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span>
                    <span class="font-medium"><?php echo htmlspecialchars($success); ?></span>
                </div>
            <?php endif; ?>
            
            <!-- Google OAuth Error Message -->
            <?php if (isset($errors['google'])): ?>
                <div class="mb-6 p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-600 dark:text-red-400 flex items-center gap-3">
                    <span class="material-symbols-outlined text-sm">error</span>
                    <span class="font-medium"><?php echo htmlspecialchars($errors['google']); ?></span>
                </div>
            <?php endif; ?>
            
            <!-- Form Container -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-soft p-6 md:p-8 card-hover">
                <form method="POST" action="" class="flex flex-col gap-6" id="registrationForm">
                    <!-- Full Name -->
                    <div class="relative">
                        <div class="floating-label">Full Name</div>
                        <input 
                            name="full_name" 
                            class="w-full h-14 px-4 bg-gray-50 dark:bg-slate-700/50 border border-gray-border dark:border-slate-600 rounded-xl form-input text-slate-800 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 <?php echo isset($errors['full_name']) ? 'error-field' : ''; ?>" 
                            placeholder="John Doe" 
                            required 
                            type="text"
                            value="<?php echo htmlspecialchars($full_name); ?>"
                        />
                        <?php if (isset($errors['full_name'])): ?>
                            <div class="error-message mt-2">
                                <span class="material-symbols-outlined text-sm">error</span>
                                <?php echo htmlspecialchars($errors['full_name']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Email -->
                    <div class="relative">
                        <div class="floating-label">Email Address</div>
                        <input 
                            name="email" 
                            class="w-full h-14 px-4 bg-gray-50 dark:bg-slate-700/50 border border-gray-border dark:border-slate-600 rounded-xl form-input text-slate-800 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 <?php echo isset($errors['email']) ? 'error-field' : ''; ?>" 
                            placeholder="name@email.com" 
                            required 
                            type="email"
                            value="<?php echo htmlspecialchars($email); ?>"
                        />
                        <?php if (isset($errors['email'])): ?>
                            <div class="error-message mt-2">
                                <span class="material-symbols-outlined text-sm">error</span>
                                <?php echo htmlspecialchars($errors['email']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Phone Number with Country Code -->
                    <div class="relative">
                        <div class="floating-label">Phone Number</div>
                        
                        <div class="flex gap-2">
                            <!-- Country Code Dropdown -->
                            <div class="w-32">
                                <select 
                                    name="country_code" 
                                    id="countryCode"
                                    class="w-full h-14 px-4 bg-gray-50 dark:bg-slate-700/50 border border-gray-border dark:border-slate-600 rounded-xl text-slate-800 dark:text-white appearance-none cursor-pointer <?php echo isset($errors['phone']) ? 'error-field' : ''; ?>"
                                    required
                                    onchange="updatePhonePlaceholder()"
                                >
                                    <option value="+1" <?php echo ($country_code === '+1') ? 'selected' : ''; ?>>🇺🇸 +1 (US)</option>
                                    <option value="+91" <?php echo ($country_code === '+91') ? 'selected' : 'selected'; ?>>🇮🇳 +91 (IN)</option>
                                    <option value="+44" <?php echo ($country_code === '+44') ? 'selected' : ''; ?>>🇬🇧 +44 (UK)</option>
                                    <option value="+61" <?php echo ($country_code === '+61') ? 'selected' : ''; ?>>🇦🇺 +61 (AU)</option>
                                    <option value="+971" <?php echo ($country_code === '+971') ? 'selected' : ''; ?>>🇦🇪 +971 (AE)</option>
                                </select>
                            </div>
                            
                            <!-- Phone Number Input -->
                            <div class="flex-1">
                                <input 
                                    name="phone" 
                                    id="phoneInput"
                                    class="w-full h-14 px-4 bg-gray-50 dark:bg-slate-700/50 border border-gray-border dark:border-slate-600 rounded-xl form-input text-slate-800 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 <?php echo isset($errors['phone']) ? 'error-field' : ''; ?>" 
                                    placeholder="Phone no" 
                                    required 
                                    type="tel"
                                    maxlength="15"
                                    value="<?php echo htmlspecialchars($phone); ?>"
                                    oninput="validatePhoneNumber()"
                                />
                            </div>
                        </div>
                        
                        <!-- Format hint -->
                        <div id="indiaFormatHint" class="text-xs text-slate-500 dark:text-slate-400 mt-1 ml-1">
                            Format: 10 digits starting with 6,7,8,9
                        </div>
                        
                        <?php if (isset($errors['phone'])): ?>
                            <div class="error-message mt-2">
                                <span class="material-symbols-outlined text-sm">error</span>
                                <?php echo htmlspecialchars($errors['phone']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Password -->
                    <div class="relative">
                        <div class="floating-label">Create Password</div>
                        <div class="relative">
                            <input 
                                name="password" 
                                id="password" 
                                class="w-full h-14 px-4 pr-12 bg-gray-50 dark:bg-slate-700/50 border border-gray-border dark:border-slate-600 rounded-xl form-input text-slate-800 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 <?php echo isset($errors['password']) ? 'error-field' : ''; ?>" 
                                placeholder="••••••••" 
                                required 
                                type="password"
                            />
                            <button class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-primary transition-colors" type="button" onclick="togglePassword()" aria-label="Toggle password visibility">
                                <span class="material-symbols-outlined" id="passwordIcon">visibility</span>
                            </button>
                        </div>
                        
                        <!-- Password Strength Meter -->
                        <div class="mt-3">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs font-medium text-slate-600 dark:text-slate-400">Password strength</span>
                                <span class="text-xs font-semibold" id="passwordStrengthText">Weak</span>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full password-strength-bar rounded-full transition-all duration-300" id="passwordStrengthBar" style="width: 0%"></div>
                            </div>
                        </div>
                        
                        <?php if (isset($errors['password'])): ?>
                            <div class="error-message mt-2">
                                <span class="material-symbols-outlined text-sm">error</span>
                                <?php echo htmlspecialchars($errors['password']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Terms & Conditions -->
                    <div class="flex items-start gap-3 py-2">
                        <div class="relative flex-shrink-0">
                            <input 
                                name="terms" 
                                class="peer absolute opacity-0"
                                id="terms" 
                                required 
                                type="checkbox"
                                <?php echo isset($_POST['terms']) ? 'checked' : ''; ?>
                            />
                            <div class="size-5 rounded border border-gray-border dark:border-slate-600 bg-white dark:bg-slate-700 flex items-center justify-center peer-checked:bg-primary peer-checked:border-primary transition-colors">
                                <span class="material-symbols-outlined text-white text-sm hidden peer-checked:block">check</span>
                            </div>
                        </div>
                        <label class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed cursor-pointer select-none" for="terms">
                            I agree to the <a class="text-primary font-semibold hover:underline" href="#">Terms of Service</a> and <a class="text-primary font-semibold hover:underline" href="#">Privacy Policy</a>, including cookie use.
                        </label>
                    </div>
                    <?php if (isset($errors['terms'])): ?>
                        <div class="error-message">
                            <span class="material-symbols-outlined text-sm">error</span>
                            <?php echo htmlspecialchars($errors['terms']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Create Account Button -->
                    <button class="w-full h-14 bg-primary hover:bg-primary-600 text-white rounded-xl font-bold text-lg transition-all shadow-medium hover:shadow-lg flex items-center justify-center gap-2 group mt-4" type="submit" id="submitBtn">
                        <span>Create Account</span>
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                    
                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-border dark:border-slate-700"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400 font-medium">Or continue with</span>
                        </div>
                    </div>
                    
                    <!-- Google Sign-In Button (Integrated) -->
                    <div id="g_id_onload"
                         data-client_id="YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com"
                         data-context="signup"
                         data-ux_mode="popup"
                         data-callback="handleGoogleSignIn"
                         data-auto_prompt="false">
                    </div>

                    <div class="g_id_signin"
                         data-type="standard"
                         data-shape="rectangular"
                         data-theme="outline"
                         data-text="signup_with"
                         data-size="large"
                         data-logo_alignment="left"
                         data-width="100%">
                    </div>
                </form>
                
                <!-- Footer Links -->
                <div class="mt-8 pt-6 border-t border-gray-border dark:border-slate-700">
                    <div class="flex flex-wrap justify-center gap-6 text-xs text-slate-500 dark:text-slate-400 font-medium">
                        <a class="hover:text-primary transition-colors" href="#">Help Center</a>
                        <a class="hover:text-primary transition-colors" href="#">Privacy Policy</a>
                        <a class="hover:text-primary transition-colors" href="#">Terms of Service</a>
                        <a class="hover:text-primary transition-colors" href="#">Contact Support</a>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="lg:hidden mt-8 text-center pb-4">
                <p class="text-sm text-slate-600 dark:text-slate-400">
                    Already have an account? 
                    <a class="text-primary font-semibold hover:underline inline-flex items-center gap-1" href="login.php">
                        Sign In
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </a>
                </p>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden lg:block mt-6 text-center">
                <p class="text-sm text-slate-600 dark:text-slate-400">
                    By signing up, you agree to our <a class="text-primary font-medium hover:underline" href="#">medical terms</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle Google Sign-In callback
    function handleGoogleSignIn(response) {
        // Extract the credential from the response
        const credential = response.credential;
        
        // Send the credential to your server for verification
        fetch('', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'google_token': credential
            })
        })
        .then(response => response.text())
        .then(data => {
            // Reload the page to show success message or redirect
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Google Sign-In failed. Please try again.', 'error');
        });
    }

    // Toggle password visibility
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const passwordIcon = document.getElementById('passwordIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.textContent = 'visibility_off';
            passwordIcon.setAttribute('aria-label', 'Hide password');
        } else {
            passwordInput.type = 'password';
            passwordIcon.textContent = 'visibility';
            passwordIcon.setAttribute('aria-label', 'Show password');
        }
    }
    
    // Password strength indicator
    document.getElementById('password').addEventListener('input', function(e) {
        const password = e.target.value;
        const strengthBar = document.getElementById('passwordStrengthBar');
        const strengthText = document.getElementById('passwordStrengthText');
        
        let strength = 0;
        let text = 'Weak';
        let color = '#ef4444'; // Red
        
        // Length check
        if (password.length >= 8) strength += 25;
        // Uppercase check
        if (/[A-Z]/.test(password)) strength += 25;
        // Lowercase check
        if (/[a-z]/.test(password)) strength += 25;
        // Number check
        if (/[0-9]/.test(password)) strength += 25;
        
        // Determine strength level
        if (strength >= 75) {
            text = 'Strong';
            color = '#10b981'; // Green
        } else if (strength >= 50) {
            text = 'Medium';
            color = '#f59e0b'; // Yellow
        } else if (strength >= 25) {
            text = 'Weak';
            color = '#ef4444'; // Red
        }
        
        // Update UI
        strengthBar.style.width = strength + '%';
        strengthBar.style.backgroundColor = color;
        strengthText.textContent = text;
        strengthText.style.color = color;
    });
    
    // Phone number country-wise formatting and validation
    function updatePhonePlaceholder() {
        const countryCode = document.getElementById('countryCode').value;
        const phoneInput = document.getElementById('phoneInput');
        const indiaHint = document.getElementById('indiaFormatHint');
        
        // Update pattern and placeholder based on country
        if (countryCode === '+91') {
            // India specific: 10 digits starting with 6-9
            phoneInput.placeholder = "Phone no";
            phoneInput.title = "Please enter a valid 10-digit Indian phone number (starts with 6,7,8,9)";
            indiaHint.textContent = "Format: 10 digits starting with 6,7,8,9";
            indiaHint.classList.remove('hidden');
        } else if (countryCode === '+1') {
            // US/Canada: 10 digits
            phoneInput.placeholder = "Phone no";
            phoneInput.title = "Please enter a valid 10-digit phone number";
            indiaHint.textContent = "Format: 10 digits";
            indiaHint.classList.remove('hidden');
        } else if (countryCode === '+44') {
            // UK: 10-11 digits
            phoneInput.placeholder = "Phone no";
            phoneInput.title = "Please enter a valid UK phone number (10-11 digits)";
            indiaHint.textContent = "Format: 10-11 digits";
            indiaHint.classList.remove('hidden');
        } else if (countryCode === '+61') {
            // Australia: 9 digits
            phoneInput.placeholder = "Phone no";
            phoneInput.title = "Please enter a valid Australian phone number (9 digits)";
            indiaHint.textContent = "Format: 9 digits";
            indiaHint.classList.remove('hidden');
        } else if (countryCode === '+971') {
            // UAE: 9 digits
            phoneInput.placeholder = "Phone no";
            phoneInput.title = "Please enter a valid UAE phone number (9 digits)";
            indiaHint.textContent = "Format: 9 digits";
            indiaHint.classList.remove('hidden');
        } else {
            phoneInput.placeholder = "Enter phone number";
            indiaHint.classList.add('hidden');
        }
        
        // DON'T clear the input when country changes
        // phoneInput.value = '';
    }

    function validatePhoneNumber() {
        const countryCode = document.getElementById('countryCode').value;
        const phoneInput = document.getElementById('phoneInput');
        let phoneValue = phoneInput.value.replace(/\D/g, ''); // Remove non-digits
        
        // Store raw value
        phoneInput.setAttribute('data-raw-value', phoneValue);
        
        // Apply max length restriction based on actual digits
        if (countryCode === '+91') {
            phoneValue = phoneValue.slice(0, 10);
            phoneInput.setAttribute('data-raw-value', phoneValue);
            
            // India: Allow only digits starting with 6-9
            if (phoneValue.length > 0 && phoneValue.length <= 10) {
                const firstDigit = phoneValue.charAt(0);
                if (!['6','7','8','9'].includes(firstDigit)) {
                    // Show error but don't clear if user is still typing
                    if (phoneValue.length === 10) {
                        showToast('Indian mobile numbers must start with 6,7,8,9', 'error');
                    }
                }
            }
            
            // For display: Add spacing for better readability
            // Only format when we have complete number or user is typing
            if (phoneValue.length === 10) {
                phoneInput.value = phoneValue.slice(0, 5) + ' ' + phoneValue.slice(5);
            } else if (phoneValue.length > 5) {
                phoneInput.value = phoneValue.slice(0, 5) + ' ' + phoneValue.slice(5);
            } else {
                phoneInput.value = phoneValue;
            }
        } else if (countryCode === '+1') {
            // US/Canada: Format as XXX-XXX-XXXX
            phoneValue = phoneValue.slice(0, 10);
            phoneInput.setAttribute('data-raw-value', phoneValue);
            
            if (phoneValue.length === 10) {
                phoneInput.value = phoneValue.slice(0, 3) + '-' + phoneValue.slice(3, 6) + '-' + phoneValue.slice(6);
            } else if (phoneValue.length > 6) {
                phoneInput.value = phoneValue.slice(0, 3) + '-' + phoneValue.slice(3, 6) + '-' + phoneValue.slice(6);
            } else if (phoneValue.length > 3) {
                phoneInput.value = phoneValue.slice(0, 3) + '-' + phoneValue.slice(3);
            } else {
                phoneInput.value = phoneValue;
            }
        } else if (countryCode === '+44') {
            // UK: Format with spaces
            phoneValue = phoneValue.slice(0, 11);
            phoneInput.setAttribute('data-raw-value', phoneValue);
            
            if (phoneValue.length > 4) {
                phoneInput.value = phoneValue.slice(0, 4) + ' ' + phoneValue.slice(4);
            } else {
                phoneInput.value = phoneValue;
            }
        } else if (countryCode === '+61' || countryCode === '+971') {
            // Australia/UAE: 9 digits with spaces
            phoneValue = phoneValue.slice(0, 9);
            phoneInput.setAttribute('data-raw-value', phoneValue);
            
            if (phoneValue.length > 3) {
                phoneInput.value = phoneValue.slice(0, 3) + ' ' + phoneValue.slice(3);
            } else {
                phoneInput.value = phoneValue;
            }
        } else {
            phoneInput.value = phoneValue;
            phoneInput.setAttribute('data-raw-value', phoneValue);
        }
    }
    
    // Form validation and submission
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const terms = document.getElementById('terms').checked;
        const phoneInput = document.getElementById('phoneInput');
        const countryCode = document.getElementById('countryCode').value;
        
        // Basic validation (server-side is primary)
        if (password.length < 8) {
            e.preventDefault();
            showToast('Password must be at least 8 characters long', 'error');
            return;
        }
        
        // Phone validation on submit - use raw value
        const phoneValue = phoneInput.getAttribute('data-raw-value') || phoneInput.value.replace(/\D/g, '');
        if (countryCode === '+91') {
            if (phoneValue.length !== 10) {
                e.preventDefault();
                showToast('Indian phone number must be exactly 10 digits', 'error');
                return;
            }
            if (!/^[6-9]/.test(phoneValue)) {
                e.preventDefault();
                showToast('Indian mobile numbers must start with 6,7,8,9', 'error');
                return;
            }
        } else if (countryCode === '+1') {
            if (phoneValue.length !== 10) {
                e.preventDefault();
                showToast('US/Canada phone number must be 10 digits', 'error');
                return;
            }
        }
        
        if (!terms) {
            e.preventDefault();
            showToast('You must agree to the terms and conditions', 'error');
            return;
        }
        
        // Show loading state
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>Creating Account...</span><span class="material-symbols-outlined animate-spin">refresh</span>';
    });
    
    // Toast notification function
    function showToast(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `fixed top-4 right-4 z-50 px-4 py-3 rounded-lg shadow-lg text-white font-medium flex items-center gap-2 transform transition-transform duration-300 ${
            type === 'error' ? 'bg-red-500' : 'bg-primary'
        }`;
        toast.innerHTML = `
            <span class="material-symbols-outlined">${type === 'error' ? 'error' : 'info'}</span>
            <span>${message}</span>
        `;
        document.body.appendChild(toast);
        
        // Remove toast after 3 seconds
        setTimeout(() => {
            toast.style.transform = 'translateX(100%)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
    
    // Add focus styles to inputs
    document.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('focus', function() {
            this.classList.add('ring-2', 'ring-primary/20');
        });
        input.addEventListener('blur', function() {
            this.classList.remove('ring-2', 'ring-primary/20');
        });
    });
    
    // Initialize form
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize phone input
        updatePhonePlaceholder();
        
        // Auto-focus first input
        document.querySelector('input[name="full_name"]').focus();
        
        // Add subtle animation to form container
        const formContainer = document.querySelector('.card-hover');
        if (formContainer) {
            formContainer.style.opacity = '0';
            formContainer.style.transform = 'translateY(10px)';
            setTimeout(() => {
                formContainer.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                formContainer.style.opacity = '1';
                formContainer.style.transform = 'translateY(0)';
            }, 100);
        }
    });
</script>
</body>
</html>