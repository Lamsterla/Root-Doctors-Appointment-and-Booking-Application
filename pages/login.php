<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Healthcare Sign In | HealSync</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#0a7d8f",
                        "background-light": "#f6f8f8",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Manrope', sans-serif;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        .login-container {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-background-light text-[#0d1a1c] font-display">
<div class="flex min-h-screen w-full">
    <!-- Left Side: Branding and Hero -->
    <div class="hidden lg:flex lg:w-3/5 relative overflow-hidden bg-primary items-center justify-center p-12 login-container">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-primary/90 to-primary/40 z-10"></div>
            <img alt="Healthcare Professional with Patient" class="w-full h-full object-cover" data-alt="Modern bright medical facility with friendly staff" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAn6oa-ywmIXLjLbvv5c0xFOwiS_ue1ESBqq1sh6669_zJVXoAraKlFshNt6uZwzsf64h1MX-mChB93xBF92iFbQkI9rswAvs_0Avy3M-FOPHL_v7qTKx57j7_566BDVc02Bt5J9_3dHKICL3qlohlBhpwFvyez1lNZkd48edcF3jEg4mpoRcbuuaetMrPEN4GbxJPAOhj9advci6irCMlFwBYBNI_Sj8wIyk66DyJWmKM_r7YW_vxIeqzl5kR63-FolZ600MT9r-A"/>
        </div>
        <div class="relative z-20 max-w-xl text-white">
            <div class="mb-8 flex items-center gap-3">
                <div class="size-10 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center">
                    <svg class="text-white size-6" fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M47.2426 24L24 47.2426L0.757355 24L24 0.757355L47.2426 24ZM12.2426 21H35.7574L24 9.24264L12.2426 21Z" fill="currentColor" fill-rule="evenodd"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold tracking-tight">HealSync</h2>
            </div>
            <h1 class="text-5xl font-extrabold leading-tight mb-6">
                Manage your health <br/><span class="text-white/80">with ease.</span>
            </h1>
            <p class="text-lg text-white/90 font-normal mb-8 leading-relaxed">
                Book appointments and manage your medical records in one secure place. Your health, simplified and synchronized across all your devices.
            </p>
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10 hover:bg-white/15 transition-all duration-300">
                    <span class="material-symbols-outlined text-white mb-2">verified_user</span>
                    <h4 class="font-bold">Secure Data</h4>
                    <p class="text-sm text-white/70">End-to-end encryption for all records.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10 hover:bg-white/15 transition-all duration-300">
                    <span class="material-symbols-outlined text-white mb-2">event_available</span>
                    <h4 class="font-bold">Quick Booking</h4>
                    <p class="text-sm text-white/70">Connect with doctors in seconds.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Right Side: Sign In Form -->
    <div class="w-full lg:w-2/5 bg-white flex flex-col items-center justify-center p-6 md:p-12 lg:p-20 login-container">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="mb-10 text-left">
                <h2 class="text-3xl font-bold tracking-tight text-[#0d1a1c]">Welcome Back</h2>
                <p class="text-[#4b909b] mt-2">Please enter your details to sign in.</p>
            </div>
            
            <!-- Form -->
            <form class="space-y-5" id="loginForm">
                <!-- Email Field -->
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-[#0d1a1c] ml-1">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-[#4b909b]">
                            <span class="material-symbols-outlined text-[20px]">mail</span>
                        </div>
                        <input 
                            class="w-full pl-11 pr-4 py-3.5 bg-background-light border border-[#cfe4e8] rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-[#0d1a1c]" 
                            placeholder="e.g. name@healthcare.com" 
                            type="email"
                            id="email"
                            name="email"
                            required
                        />
                    </div>
                </div>
                
                <!-- Password Field -->
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-[#0d1a1c] ml-1">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-[#4b909b]">
                            <span class="material-symbols-outlined text-[20px]">lock</span>
                        </div>
                        <input 
                            class="w-full pl-11 pr-12 py-3.5 bg-background-light border border-[#cfe4e8] rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all text-[#0d1a1c]" 
                            placeholder="••••••••" 
                            type="password"
                            id="password"
                            name="password"
                            required
                        />
                        <button class="absolute inset-y-0 right-0 pr-4 flex items-center text-[#4b909b] hover:text-primary" type="button" onclick="togglePassword()">
                            <span class="material-symbols-outlined text-[20px]" id="visibilityIcon">visibility</span>
                        </button>
                    </div>
                </div>
                
                <!-- Actions Row -->
                <div class="flex items-center justify-between py-1">
                    <div class="flex items-center gap-2">
                        <input 
                            class="w-4 h-4 rounded border-[#cfe4e8] text-primary focus:ring-primary/20" 
                            id="remember" 
                            type="checkbox"
                            name="remember"
                        />
                        <label class="text-sm text-[#0d1a1c] cursor-pointer" for="remember">Remember me</label>
                    </div>
                    <a class="text-sm font-semibold text-primary hover:underline" href="#" id="forgotPassword">Forgot Password?</a>
                </div>
                
                <!-- Error/Success Message Container -->
                <div id="messageContainer" class="hidden">
                    <div id="message" class="px-4 py-3 rounded-lg text-sm"></div>
                </div>
                
                <!-- Sign In Button -->
                <button 
                    class="w-full py-4 bg-primary hover:bg-primary/90 text-white font-bold rounded-xl shadow-lg shadow-primary/20 transition-all active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed" 
                    type="submit" 
                    id="submitBtn"
                >
                    <span id="submitText">Sign In</span>
                    <span id="loadingSpinner" class="hidden">
                        <svg class="animate-spin h-5 w-5 text-white mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </form>
            
            <!-- Divider -->
            <div class="relative my-8 text-center">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-[#cfe4e8]"></div>
                </div>
                <span class="relative px-4 text-xs font-semibold uppercase tracking-wider text-[#4b909b] bg-white">Or continue with</span>
            </div>
            
            <!-- Social Buttons -->
            <div class="grid grid-cols-2 gap-4">
                <button class="flex items-center justify-center gap-2 py-3 border border-[#cfe4e8] rounded-xl hover:bg-background-light transition-all social-btn" type="button" data-provider="google">
                    <svg class="size-5" viewbox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.66l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
                    </svg>
                    <span class="text-sm font-bold text-[#0d1a1c]">Google</span>
                </button>
                <button class="flex items-center justify-center gap-2 py-3 border border-[#cfe4e8] rounded-xl hover:bg-background-light transition-all social-btn" type="button" data-provider="apple">
                    <svg class="size-5" fill="currentColor" viewbox="0 0 24 24">
                        <path d="M17.05 20.28c-.96.95-2.18 1.78-3.4 1.72-1.16-.06-1.87-.72-3.18-.72-1.31 0-2.1.72-3.17.72-1.23.06-2.43-.77-3.4-1.72-2.13-2.11-2.95-5.91-1.35-8.48 1.02-1.63 2.76-2.68 4.49-2.68 1.15 0 2.16.5 3.1.5.95 0 2.21-.6 3.47-.6 1.44 0 2.8.59 3.73 1.57-2.98 1.34-2.52 5.56.51 6.89-.58 1.79-1.57 3.51-2.8 4.8zm-4.73-14.73c0-1.85 1.54-3.55 3.3-3.55.12 1.94-1.68 3.74-3.3 3.55z"></path>
                    </svg>
                    <span class="text-sm font-bold text-[#0d1a1c]">Apple</span>
                </button>
            </div>
            
            <!-- Footer Link -->
            <p class="mt-10 text-center text-sm text-[#0d1a1c]">
                Don't have an account? 
                <a class="font-bold text-primary hover:underline" href="register.php" id="signUpLink">Sign Up</a>
            </p>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const visibilityIcon = document.getElementById('visibilityIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            visibilityIcon.textContent = 'visibility_off';
        } else {
            passwordInput.type = 'password';
            visibilityIcon.textContent = 'visibility';
        }
    }
    
    // Show message function
    function showMessage(message, type = 'error') {
        const container = document.getElementById('messageContainer');
        const messageDiv = document.getElementById('message');
        
        // Set message and style
        messageDiv.textContent = message;
        messageDiv.className = `px-4 py-3 rounded-lg text-sm ${type === 'error' ? 'bg-red-50 border border-red-200 text-red-600' : 'bg-green-50 border border-green-200 text-green-600'}`;
        
        // Show container
        container.classList.remove('hidden');
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            container.classList.add('hidden');
        }, 5000);
    }
    
    // Form submission handling
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const remember = document.getElementById('remember').checked;
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const loadingSpinner = document.getElementById('loadingSpinner');
        
        // Validation
        if (!email || !password) {
            showMessage('Please fill in all fields', 'error');
            return;
        }
        
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            showMessage('Please enter a valid email address', 'error');
            return;
        }
        
        if (password.length < 6) {
            showMessage('Password must be at least 6 characters long', 'error');
            return;
        }
        
        // Show loading state
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        loadingSpinner.classList.remove('hidden');
        
        try {
            // This is where you'll add AJAX call to PHP backend
            // For now, simulate API call
            await new Promise(resolve => setTimeout(resolve, 1500));
            
            // For demo purposes - simulate successful login
            // In real implementation, you would call your PHP backend
            if (email === 'demo@example.com' && password === 'password') {
                showMessage('Login successful! Redirecting...', 'success');
                
                // Store login state in localStorage for demo
                localStorage.setItem('userLoggedIn', 'true');
                localStorage.setItem('userEmail', email);
                
                // Redirect after delay
                setTimeout(() => {
                    window.location.href = 'dashboard.php';
                }, 1000);
            } else {
                showMessage('Invalid email or password. Try demo@example.com / password', 'error');
            }
        } catch (error) {
            showMessage('An error occurred. Please try again.', 'error');
        } finally {
            // Reset loading state
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            loadingSpinner.classList.add('hidden');
        }
    });
    
    // Forgot password handler
    document.getElementById('forgotPassword').addEventListener('click', function(e) {
        e.preventDefault();
        const email = document.getElementById('email').value.trim();
        
        if (!email) {
            showMessage('Please enter your email address first', 'error');
            document.getElementById('email').focus();
            return;
        }
        
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            showMessage('Please enter a valid email address', 'error');
            return;
        }
        
        showMessage(`Password reset link sent to ${email} (demo)`, 'success');
        
        // In real implementation, you would make an API call
        console.log(`Password reset requested for: ${email}`);
    });
    
    // Social login handlers
    document.querySelectorAll('.social-btn').forEach(button => {
        button.addEventListener('click', function() {
            const provider = this.getAttribute('data-provider');
            showMessage(`${provider.charAt(0).toUpperCase() + provider.slice(1)} login is disabled in demo mode`, 'error');
        });
    });
    
    // Sign up link handler
    document.getElementById('signUpLink').addEventListener('click', function(e) {
        e.preventDefault();
        showMessage('Registration page coming soon!', 'success');
        
        // In real implementation, this would navigate to register.php
        setTimeout(() => {
            window.location.href = 'register.php';
        }, 1500);
    });
    
    // Check for saved email from remember me
    document.addEventListener('DOMContentLoaded', function() {
        const savedEmail = localStorage.getItem('savedEmail');
        if (savedEmail) {
            document.getElementById('email').value = savedEmail;
            document.getElementById('remember').checked = true;
        }
        
        // Auto-focus email field
        document.getElementById('email').focus();
        
        // Save email on checkbox change
        document.getElementById('remember').addEventListener('change', function() {
            const email = document.getElementById('email').value.trim();
            if (this.checked && email) {
                localStorage.setItem('savedEmail', email);
            } else {
                localStorage.removeItem('savedEmail');
            }
        });
        
        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl+Enter to submit
            if (e.ctrlKey && e.key === 'Enter') {
                document.getElementById('loginForm').dispatchEvent(new Event('submit'));
            }
            
            // Escape to clear form
            if (e.key === 'Escape') {
                document.getElementById('loginForm').reset();
                showMessage('Form cleared', 'success');
            }
        });
    });
</script>
</body>
</html>